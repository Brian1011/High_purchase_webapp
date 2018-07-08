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

use App\Items;

Route::get('/', function () {
    $items = Items::all();
    //return view('Admin.Item', ['items' =>$items]);
    return view('index', ['items' =>$items]);
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'UsersConroller@showRegistrationForm');

//add item
Route::post('/Item', 'ItemsController@addItem');

//add items view
Route::get('/Item_add',function (){
   return view('Admin/addItem');
});

//view addItem Form
Route::get('/ItemForm', 'ItemsController@showAddItemForm');

//user views a single item
Route::get('/Item/View/{id}', 'ItemsController@purchaseItem');

//Update a specific item
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

//view all purchases made by a customer
Route::get('/all_purchases', function (){
   return view('all_purchases');
});

//view ADD manager Form
Route::get('/ManagerForm', 'UsersConroller@showAddManagerForm');

//add manager
Route::post('/AddManager', 'UsersConroller@addManager');

//view Update Manager Form
//view specific manager
Route::get('/Manager/Edit/{id}', 'UsersConroller@viewSpecificManager');

//view all managers
Route::get('/Managers', 'UsersConroller@showallManagers');

//view ADD customer Form
//add custommer
Route::post('/AddCustomer', 'UsersConroller@addCustomer');

//add custommer
Route::post('/login', 'UsersConroller@login');

//add installement
Route::post('/installement', 'InstallmentsController@addInstallement');

//view specific installement
Route::get('/myInstallement', 'InstallmentsController@viewSpecificInstallement');

//view specific installement
Route::get('/allInstallement', 'InstallmentsController@showallInstallements');

//view Uodate customer Form
//view specific customer
//view all customers

//login the user
Route::post('/login','UsersConroller@login');

//show user profile
Route::get('/profile', function () {
    return view('profile');
});

//user logout
Route::get('/logout','UsersConroller@logout');