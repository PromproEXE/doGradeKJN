<?php

use App\Http\Controllers\backend\subjectListController;
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

Route::controller(subjectListController::class)
    ->prefix('subjectlist')
    ->group(function () {
        Route::get('/', 'index')->name('subjectlist');
    });
