<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\InvitationController;





Route::get('/', function () {
    return view('landingPage');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/login',function(){
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/member/dashboard', [MemberController::class, 'dashboard'])
        ->name('member.dashboard');
});

// Route::get('/formColocation',function(){
//     return view('colocation.formColocation');
// })->name('formColocation');

// Route::get('/creationColocation',[ColocationController::class,'create'])->name('creationColocation');

// Route::get('/colocations/join/{token}', [ColocationController::class, 'join'])->name('colocations.join');


// Colocation routes
Route::middleware(['auth'])->group(function () {
    // Create colocation
    Route::get('/colocations/create', [ColocationController::class, 'create'])->name('colocations.create');
    Route::post('/colocations', [ColocationController::class, 'store'])->name('colocations.store');
    
    // Manage colocation
    Route::get('/colocations/{colocation}/manage', [ColocationController::class, 'manage'])->name('colocations.manage');
    
    // Invitations
    Route::post('/invitations/send', [InvitationController::class, 'send'])->name('invitations.send');
    Route::get('/join/{token}', [InvitationController::class, 'join'])->name('invitations.join');
    
    Route::delete('/colocations/{colocation}/members/{user}', [ColocationController::class, 'removeMember'])->name('colocations.removeMember');
});

Route::get('/invitations/accept/{token}', [ColocationController::class, 'acceptInvitation'])
    ->middleware('auth')
    ->name('invitations.accept');

require __DIR__.'/auth.php';