<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\SearchController;
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


Route::get('/', [App\Http\Controllers\IndexController::class, 'index']);
Route::get('/home', [App\Http\Controllers\IndexController::class, 'index']);
Auth::routes();
Route::get('/map', [App\Http\Controllers\MapController::class, 'index'])->name('map');
Route::resource('ideas', IdeaController::class);
Route::get('ideas/{user}/mylist', [IdeaController::class, 'mylist'])->name('ideas.mylist');
Route::resource('accommodations', AccommodationController::class);
Route::put('ideas/{idea}/accommodations/{accommodation}', [IdeaController::class, 'updateAccommodation'])->name('ideas.updateAccommodation');
Route::post('ideas/{idea}/comments', [IdeaController::class, 'addComment'])->name('ideas.addComment');
Route::get('/search',[SearchController::class,'search']);
Route::get('/destination/show', 'MapMarkerController@show');
