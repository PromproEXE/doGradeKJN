<?php

use App\Http\Controllers\backend\gradeController;
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

Route::controller(gradeController::class)
    ->prefix('grade')
    ->group(function () {
        Route::get('/', 'index')->name('dashboard');
    });
