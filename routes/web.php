<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\NiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->prefix('threads')->group(function () {
Route::get('/',[ThreadController::class,'index'])->name('thread');
Route::get('/create',[ThreadController::class,'create'])->name('thread.create');
Route::post('/store',[ThreadController::class,'store'])->name('thread.store');
Route::get('/{thread}', [ThreadController::class, 'show'])->name('thread.show');
Route::get('/nice/{thread}',[NiceController::class,'nice'])->name('nice');
Route::get('/unnice/{thread}',[NiceController::class,'unnice'])->name('unnice');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
