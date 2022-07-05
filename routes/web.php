<?php

use App\Http\Controllers\ChatsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
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

Route::get('/dashboard', [ViewController::class, 'dashboard']);
Route::get('/login', [ViewController::class, 'Login']);
Route::get('/chat', [ViewController::class, 'Chat']);


Route::post('/pusher/auth ', [ChatsController::class, 'AuthChat']);


Route::prefix('api')->group(function () {

    Route::get('/auth', [UserController::class, 'authenticate']);
    Route::get('/login', [UserController::class, 'Login']);
    Route::get('/logout', [UserController::class, 'Logout']);
    Route::get('/register', [UserController::class, 'Register']);
    Route::prefix('user')->group(function () {
        Route::get('/profile', [UserController::class, 'Profile']);
    });

    Route::prefix('chat')->group(function () {
        Route::get('/sendMessage', [ChatsController::class, 'Test']);
    });
});
