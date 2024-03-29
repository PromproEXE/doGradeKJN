<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::controller(indexController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/getgrade', 'getGrade')->name('getGrade');
});
