<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MemberController extends Controller
{
    
    public function dashboard(){
        $user = Auth::user();

$colocation = $user->colocations()
    ->wherePivotNull('left_at')
    ->first();

return view('member.dashboard', compact('colocation'));
    }
}
