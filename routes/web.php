<?php

use App\Http\Controllers\ShortcutController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/shortcuts', ShortcutController::class);
Route::resource('/comments', CommentController::class);

Route::get('/user/{username}', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/user/{username}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit_profile');
Route::post('/user/edit', [App\Http\Controllers\HomeController::class, 'update'])->name('update_profile');

Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
