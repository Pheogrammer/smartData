<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('newschool', 'SchoolController@newschool')->name('newschool')->middleware('auth');
Route::post('savenewschool','SchoolController@savenewschool')->name('savenewschool')->middleware('auth');
Route::get('schools','SchoolController@schools')->name('schools')->middleware('auth');

Route::post('savestudent','StudentController@savestudent')->name('savestudent')->middleware('auth');

Route::get('viewschool/{id}','SchoolController@viewschool')->name('viewschool')->middleware('auth');
Route::get('newstudent/{id}','StudentController@newstudent')->name('newstudent')->middleware('auth');
////

