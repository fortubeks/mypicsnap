<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//home page routes to default event page
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::post('/upload', [ImageController::class, 'upload'])->name('upload');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/event/{uid}', [EventController::class, 'index'])->name('home');
Route::get('/event/{uid}/gallery', [GalleryController::class, 'index'])->name('gallery');

//Route::resource('events', EventController::class);
//Route::get('/event/add-guest', [EventController::class, 'addGuestToEvent'])->name('event.guest.add');

require __DIR__ . '/auth.php';
