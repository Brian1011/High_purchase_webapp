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

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'UsersConroller@showRegistrationForm');

//add item
Route::post('/Item', 'ItemsController@addItem');

//view addItem Form
Route::get('/ItemForm', 'ItemsController@showAddItemForm');

//view updateItem Form
//Route::get('/Item/View/{id}', 'ItemsController@');

//view specific item
Route::get('/Item/Edit/{id}', 'ItemsController@viewSpecificItem');

//view all item
Route::get('/Item', 'ItemsController@showallItems');

//view ADD manager Form
Route::get('/ManagerForm', 'UsersConroller@showAddManagerForm');

//add manager
Route::post('/AddManager', 'ItemsController@add');

//view specific manager
Route::get('/Manager/Edit/{id}', 'UsersConroller@viewSpecificManager');

//view all managers
Route::get('/Managers', 'UsersConroller@showallManagers');
//view ADD customer Form
//add custommer
//view Uodate customer Form
//view specific customer
//view all customers
