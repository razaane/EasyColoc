<?php

namespace App\Http\Controllers;
use App\Models\Colocation;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Invitation;
use App\Mail\ColocationInvitationMail;
use Illuminate\Support\Facades\Mail;


class ColocationController extends Controller
{

    public function store(Request $request)
{
    $user = auth()->user();

    // Vérifier si déjà membre d'une colocation active
    if ($user->colocations()->wherePivot('left_at', null)->exists()) {
        return back()->with('error', 'Vous faites déjà partie d’une colocation active !');
    }

    // Créer la colocation
    $colocation = Colocation::create([
        'name' => $request->name,
        'owner_id' => $user->id,
        'invite_token' => Str::random(32),
        'status' => 'active'
    ]);

    // Attacher l’owner dans la table pivot
    $user->colocations()->attach($colocation->id, [
        'role' => 'owner',
        'joined_at' => now()
    ]);

    return redirect()->route('member.dashboard')->with('success', 'Colocation créée !');
}

// public function join($token)
// {
//     $user = auth()->user();

//     // Vérifier si déjà dans une colocation
//     if ($user->colocations()->wherePivot('left_at', null)->exists()) {
//         return back()->with('error', 'Vous êtes déjà dans une colocation active.');
//     }

//     // Trouver la colocation par token
//     $colocation = Colocation::where('invite_token', $token)->where('status', 'active')->firstOrFail();

//     // Attacher comme membre
//     $user->colocations()->attach($colocation->id, [
//         'role' => 'member',
//         'joined_at' => now()
//     ]);

//     return redirect()->route('member.dashboard')->with('success', 'Vous avez rejoint la colocation !');
// }
public function create()
{
    return view('colocations.create');
}

public function sendInvitation(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $colocation = auth()->user()->colocations()->first();

    $invitation = Invitation::create([
        'colocation_id' => $colocation->id,
        'email' => $request->email,
        'token' => Str::uuid(),
        'expires_at' => now()->addDays(2),
    ]);

    Mail::to($request->email)
        ->send(new ColocationInvitationMail($invitation));

    return back()->with('success', 'Invitation envoyée !');
}


public function acceptInvitation($token)
{
    $invitation = Invitation::where('token', $token)->firstOrFail();

    if ($invitation->expires_at < now()) {
        abort(403, 'Invitation expirée');
    }

    if (auth()->user()->email !== $invitation->email) {
        abort(403, 'Email non autorisé');
    }

    // Vérifier colocation active
    if (auth()->user()->colocations()->wherePivot('left_at', null)->exists()) {
        return redirect()->route('member.dashboard')
            ->with('error', 'Vous avez déjà une colocation active.');
    }

    // Ajouter dans pivot
    auth()->user()->colocations()->attach($invitation->colocation_id, [
        'role' => 'member',
        'joined_at' => now()
    ]);

    $invitation->update([
        'accepted_at' => now()
    ]);

    return redirect()->route('member.dashboard')
        ->with('success', 'Vous avez rejoint la colocation !');
}
}

