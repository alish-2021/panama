<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\panel\ArticleController;
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

Route::get('/', [PageController::class, 'indexPage'])->name('page.index');
Auth::routes();

Route::group(['prefix' => 'panel'],  function(){
    Route::get('/', function (){return view('panel.index');})->name('panel.index');
    Route::resource('article', ArticleController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
