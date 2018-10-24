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
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'App\Http\Middleware\AdminMiddleware'], function(){
    Route::resource('tiposTicket','TiposTicketController',['except' => 'show,index']);
    
});
Route :: resource ('Eventos','EventosController');
Route :: get ('Eventos/{Eventos}/ticket','EventosController@ticket');