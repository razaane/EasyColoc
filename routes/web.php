<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColocationController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

Route::get('/formColocation',function(){
    return view('colocation.formColocation');
})->name('formColocation');

Route::get('/creationColocation',[ColocationController::class,'create'])->name('creationColocation');

require __DIR__.'/auth.php';