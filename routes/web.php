<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PostController
};
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
})->name("welcome");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::middleware(['auth'])->group(
    function(){
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
        Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
        Route::delete('/posts/{id}',[PostController::class, 'delete'])->name('posts.delete');
        Route::put('/posts/{id}',[PostController::class, 'update'])->name('posts.update');
        Route::any('/posts/search',[PostController::class, 'search'])->name('posts.search');
    }
);
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');