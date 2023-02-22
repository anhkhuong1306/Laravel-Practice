<?php

use App\Http\Controllers\AuthWithAPIController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::post('/login', [AuthWithAPIController::class, 'login'])->name('login');
    Route::post('/register', [AuthWithAPIController::class, 'register'])->name('register');
    Route::post('/logout', [AuthWithAPIController::class, 'logout'])->name('logout');
    Route::get('/refresh', [AuthWithAPIController::class, 'refresh'])->name('refresh');
});
