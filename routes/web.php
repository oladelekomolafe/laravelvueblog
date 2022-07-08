<?php

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
    //return view('welcome');
     return view('pages/homepage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/api/allpost', [App\Http\Controllers\PostController::class, 'all_post'])->name('allpost');
    Route::post('/api/post/create', [App\Http\Controllers\PostController::class, 'create_post'])->name('create_post');
    Route::post('/api/post/delete', [App\Http\Controllers\PostController::class, 'delete_post'])->name('delete_post');
    Route::post('/api/post/edit', [App\Http\Controllers\PostController::class, 'edit_post'])->name('edit_post');
    Route::post('/api/post/update', [App\Http\Controllers\PostController::class, 'update_post'])->name('update_post');

    Route::post('/api/category/create', [App\Http\Controllers\CategoryController::class, 'create_category'])->name('create_category');
    Route::post('/api/category/delete', [App\Http\Controllers\CategoryController::class, 'delete_category'])->name('delete_category');
    Route::post('/api/category/edit', [App\Http\Controllers\CategoryController::class, 'edit_category'])->name('edit_category');
    Route::post('/api/category/update', [App\Http\Controllers\CategoryController::class, 'update_category'])->name('update_category');

});

Route::get('/search', [App\Http\Controllers\BlogController::class, 'search_post'])->name('search_post');
Route::get('/api/allcategory', [App\Http\Controllers\CategoryController::class, 'all_category'])->name('allcategory');
Route::get('/api/categorypost/{id}', [App\Http\Controllers\CategoryController::class, 'getPostByCatId'])->name('getPostByCatId');
Route::get('/api/allblogpost', [App\Http\Controllers\BlogController::class, 'all_blog_post'])->name('all_blog_post');
Route::get('/api/singlepost/{id}', [App\Http\Controllers\BlogController::class, 'singlepost'])->name('singlepost');


Route::get('/{any}', function () {
    return view('pages/homepage');
})->where('any', '.*');




