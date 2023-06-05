<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login');

Route::middleware(['guest'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'loginView')->name('login');
        Route::post('/login', 'login')->name('login.action');
        Route::get('/register', 'registerView')->name('register');
        Route::post('/register', 'register')->name('register.action');
    });
});

Route::get('/dashboard', function () {
    return 'dahsboard!';
});
