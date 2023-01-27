<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[PageController::class, 'index'])->name('home');

Route::middleware(['auth','verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/',[DashboardController::class, 'index'])->name('home');
        Route::get('posts/post-category',[PostController::class, 'categories_post'])->name('categories_post');
        Route::resource('posts', PostController::class);
        Route::get('posts/orderby/{column}/{direction}', [PostController::class, 'orderby'])->name('posts.orderby');
        Route::resource('categories', CategoryController::class)->except(['show','create','edit']);
        Route::resource('tags', TagController::class)->except(['show','create','edit']);
    });



require __DIR__.'/auth.php';


// rotta per tutte le rotte Vue da mettere doppo tutte le altre rotte!
Route::get('{any?}',function(){
    return view('guest.home');
})->where('any','.*')->name('home');
