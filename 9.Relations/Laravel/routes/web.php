<?php

use App\Http\Controllers\PostsController;
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

Route::get('/', [PostsController::class, 'index']);

