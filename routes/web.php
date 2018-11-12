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
//Ver Eventos
Route::get('/Eventos','CompraTicketsController@index');

//Paginas solo para Administradores
Route::group(['middleware'=>'App\Http\Middleware\AdminMiddleware'], function(){
    Route :: resource('tiposTicket','TiposTicketController',['except' => 'show,index']);
    Route :: resource ('AdmiEventos','EventosController');
   // Route :: resource('admi','AdmiController');
});

//Paginas solo para ususarios
//Route::group(['middleware'=>'App\Http\Middleware\UserMiddleware'], function(){
    //Compras
    Route::get('/Eventos/{id}/Detalle','CompraTicketsController@Detalle');
    Route::post('/Eventos/Comprar','CompraTicketsController@Comprar');

    //Cuenta
    Route::get('/MiCuenta','CuentaController@index');
    Route::get('/MiCuenta/Tickets','CuentaController@Tickets');
    Route::get('/MiCuenta/{id}/Devolver','CuentaController@Devolucion');
    Route::get('/MiCuenta/Saldo','CuentaController@Saldo');
    Route::post('/MiCuenta/Abono','CuentaController@Abono');
    Route::get('/MiCuenta/Abonar','CuentaController@Abonar');
//});
//temporal
Route :: resource('admi','AdmiController');

Route::get('/Creditos', function(){
    return view('Creditos');
});
Route::get('/home', 'HomeController@index')->name('home');