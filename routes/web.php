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
    return view('index');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'UsersConroller@showRegistrationForm');

//add item
Route::post('/Item', 'ItemsController@addItem');

//view addItem Form
Route::get('/ItemForm', 'ItemsController@showAddItemForm');

//view updateItem Form
Route::get('/Item/View/{id}', 'ItemsController@');

//view specific item
Route::get('/Item/Edit/{id}', 'ItemsController@viewSpecificItem');

//view all item
Route::get('/Item', 'ItemsController@showallItems');

//view login
Route::get('/login', function () {
    return view('login');
});

//view signup
Route::get('/signup', function () {
    return view('signup');
});

//view add manager Form
Route::get('/addmanager', function () {
    return view('welcome');
});

//view one single item
Route::get('/purchase', function (){
    return view('purchase_item');
});

//add manager

//view Update Manager Form
//view specific manager
//view all managers

//view ADD customer Form
//add custommer
//view Uodate customer Form
//view specific customer
//view all customers
