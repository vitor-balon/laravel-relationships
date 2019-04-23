<?php

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

Route::get('one-to-one', 'OneToOneController@OneToOne');
Route::get('one-to-one-inverse', 'OneToOneController@OneToOneInverse');
Route::get('one-to-one-insert', 'OneToOneController@OneToOneInsert');

Route::get('one-to-many', 'OneToManyController@oneToMany');
Route::get('many-to-one', 'OneToManyController@manyToOne');
Route::get('one-to-many-two', 'OneToManyController@oneToManyTwo');
Route::get('one-to-many-insert', 'OneToManyController@oneToManyInsert');
Route::get('one-to-many-insert-two', 'OneToManyController@oneToManyInsertTwo');

Route::get('has-many-through', 'OneToManyController@hasManyThrough');

Route::get('many-to-many', 'ManyToManyController@manyToMany');
Route::get('many-to-many-inverse', 'ManyToManyController@manyToManyInverse');