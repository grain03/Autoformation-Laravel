<?php

use App\Http\Controllers\BlogController;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Posts;
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

Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function (){
    Route::get('/', 'index')->name('index');
    
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');

    Route::get('/{post}/edit', 'edit')->name('edit');
    Route::patch('/{post}/edit', 'update');

    Route::get('/{slug}-{post:id}', 'show')->where([
        'post' => '[0-9]+',
        'slug' => '[a-z0-9\-]+',
    ])->name('show');
});

