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
        //GENERAL API
        Route::get('/', 'all_data')->name('subjectlist_getall');
        Route::get('/{subject_id}', 'getSome')->name('subjectlist_getsome');
        Route::post('/create', 'store')->name('subjectlist_create');
        Route::put('/update/{subject_id}', 'update')->name('subjectlist_update');
        Route::delete('/delete/{subject_id}', 'delete')->name('subjectlist_delete');

        //SINGLE COLUMN - NAME
        Route::get('col/name/{subject_id}', 'get_single_col_name')->name('subjectlist_get_single_col_name');

        //SINGLE COLUMN - CLASS
        Route::get('col/class/{subject_id}', 'get_single_col_class')->name('subjectlist_get_single_col_class');

        //SINGLE COLUMN - TEACH BY
        Route::get('col/teach_by/{subject_id}', 'get_single_col_teach_by')->name('subjectlist_get_single_col_teach_by');
    });
