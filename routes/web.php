
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

Auth::routes();

//Public Routes

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show','NewsController@show');
Route::get('/view/{id}','NewsController@view');
Route::post('/search','NewsController@search');
Route::post('/dateSearch','NewsController@datesearch');

// Routes for Admins only with middleware for admins
Route::group(['middleware'=>'isAdmin'],function (){
    Route::get('/addNews','NewsController@add');
    Route::post('/add','NewsController@create');
    Route::get('/view/{id}/delete','NewsController@destroy');
    Route::get('/view/{id}/edit','NewsController@edit');
    Route::post('/view/{id}/update','NewsController@update');
});
