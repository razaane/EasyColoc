<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        if($request->hasFile('photo')){
            $path = $request->file('photo')->store('profile_photos','public');
            $request->user()->photo =$path;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

//     public function leaveColocation(){
//         $user =auth()->user();

//         if(!$colocation->users->contains($users)){
//             abort(403);
//         }

//         $colocation->users->updateExistingPivot($user->id,[
//             'left_at' => now(),
//             'role'=>'former',
//         ]);

//         return redirect()->route('dashboard')->with('sucess','Vous avez quitté la colocation .');
//     }

//     public function cancelColocation(Colocation $colocation)
// {
//     $user = auth()->user();

//     if ($colocation->owner_id !== $user->id) {
//         abort(403);
//     }

//     $colocation->status = 'cancelled';
//     $colocation->save();

//     // Met à jour tous les membres
//     foreach ($colocation->users as $member) {
//         $colocation->users()->updateExistingPivot($member->id, [
//             'left_at' => now(),
//         ]);
//     }

//     return redirect()->route('dashboard')->with('success', 'Colocation annulée.');
// }
}
