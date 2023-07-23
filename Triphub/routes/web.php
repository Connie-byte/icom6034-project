<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;

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



Route::get('/map', [App\Http\Controllers\MapController::class, 'index']);
Route::resource('ideas', IdeaController::class);
Route::resource('accommodations', AccommodationController::class);
Route::put('ideas/{idea}/accommodations/{accommodation}', [IdeaController::class, 'updateAccommodation'])->name('ideas.updateAccommodation');
Route::post('ideas/{idea}/comments', [IdeaController::class, 'addComment'])->name('ideas.addComment');

