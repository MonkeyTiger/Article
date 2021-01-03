<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

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

Route::middleware('auth')->namespace('Admin')->prefix('admin')->group(function () {
    Route::resource('article', ArticleController::class);
    Route::post('article/update-article/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'updateArticle']);
    Route::resource('header', HeaderController::class);
    Route::resource('footer', FooterController::class);
});

Route::resource('/', HomeController::class);
Route::get('search', [SearchController::class, 'index']);
Route::get('logout', '\App\Http\Controllers\LoginController@logout');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
