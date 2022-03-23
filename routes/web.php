<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\panel\ArticleController;
use App\Http\Controllers\panel\BlogController;
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
Route::get('/article', [PageController::class, 'articlePage'])->name('page.article');

Route::group(['prefix' => 'blog'], function(){
    Route::get('/', [PageController::class, 'blogIndexPage'])->name('page.blog.index');
    Route::get('/{id}', [PageController::class, 'blogShowPage'])->name('page.blog.show');
});

Auth::routes();
Route::middleware(['middleware' => 'auth'])->prefix('panel')->group(function (){
    Route::get('/', function (){return view('panel.index');})->name('panel.index');
    Route::resource('article', ArticleController::class);
    Route::resource('blog', BlogController::class);
});

