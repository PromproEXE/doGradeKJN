<?php

use App\Http\Controllers\backend\usersController;
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

Route::controller(usersController::class)
    ->prefix('users')
    ->group(function () {
        //GENERAL API
        Route::get('/', 'all_data')->name('user_getall');
        Route::get('/{user_id}', 'getSome')->name('user_getsome');
        Route::post('/create', 'store')->name('user_created');
        Route::put('/update/{user_id}', 'update')->name('user_update');
        Route::delete('/delete/{user_id}', 'delete')->name('user_delete');

        //SINGLE COLUMN - NAME
        Route::get('col/name/{user_id}', 'get_single_col_name')->name('user_get_single_col_name');
    });
