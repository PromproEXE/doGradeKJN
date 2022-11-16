<?php

use App\Http\Controllers\backend\studentDataController;
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

Route::controller(studentDataController::class)
    ->prefix('studentdata')
    ->group(function () {
        //GENERAL API
        Route::get('/', 'all_data')->name('studentdata_getall');
        Route::get('/{std_id}', 'getSome')->name('studentdata_getsome');
        Route::post('/create', 'store')->name('studentdata_create');
        Route::put('/update/std/{std_id}', 'update_std')->name('studentdata_std_update');
        Route::put('/update/class', 'update_class')->name('studentdata_class_update');
        Route::delete('/delete/std_id/{std_id}', 'delete_std_id')->name('studentdata_class_delete');
        Route::delete('/delete/class/{grade}', 'delete_grade')->name('studentdata_grade_delete');

        //SINGLE COLUMN - NAME
        Route::get('col/name/{std_id}', 'get_single_col_name')->name('studentdata_get_single_col_name');

        //SINGLE COLUMN - CLASS
        Route::get('col/class/{std_id}', 'get_single_col_class')->name('studentdata_get_single_col_class');

        //SINGLE COLUMN - ROOM
        Route::get('col/room/{std_id}', 'get_single_col_room')->name('studentdata_get_single_col_room');

        //SINGLE COLUMN - GRADE TERM 1
        Route::get('col/grade_term_1/{std_id}', 'get_single_col_grade_term_1')->name('studentdata_get_single_col_grade_term_1');

        //SINGLE COLUMN - GRADE TERM 2
        Route::get('col/grade_term_2/{std_id}', 'get_single_col_grade_term_2')->name('studentdata_get_single_col_grade_term_2');

        //SINGLE COLUMN - GRADE TERM 3
        Route::get('col/grade_term_3/{std_id}', 'get_single_col_grade_term_3')->name('studentdata_get_single_col_grade_term_3');

        //SINGLE COLUMN - GRADE TERM 4
        Route::get('col/grade_term_4/{std_id}', 'get_single_col_grade_term_4')->name('studentdata_get_single_col_grade_term_4');

        //SINGLE COLUMN - GRADE TERM 5
        Route::get('col/grade_term_5/{std_id}', 'get_single_col_grade_term_5')->name('studentdata_get_single_col_grade_term_5');

        //SINGLE COLUMN - GRADE TERM 6
        Route::get('col/grade_term_6/{std_id}', 'get_single_col_grade_term_6')->name('studentdata_get_single_col_grade_term_6');
    });
