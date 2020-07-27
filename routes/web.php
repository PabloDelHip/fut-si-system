<?php

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


Route::get('/', function () {
    

    
});
 


//resultados
Route::get('resultados/{torneo?}/{id?}', ['as' => 'resultados', 'uses' => 'ResultadosController@index']);
Route::get('detalles-partido/{partido?}/{torneo?}/{id_partido?}', ['as' => 'detalles-partido', 'uses' => 'ResultadosController@detalles_partido']);

//ADMIN
Route::get('login', ['as' => 'login', 'uses' => 'LoginController@login']);
Route::post('datos-login', ['as' => 'datos-login', 'uses' => 'LoginController@datosLogin']);
Route::group(['middleware' => ['login_token']], function () {

    Route::get('panel-fut-si', ['as' => 'panel-fut-si', 'uses' => 'AdminController@index']);

    //INSTALACIONES//
    Route::get('panel-fut-si/instalaciones', ['as' => 'panel-fut-si/instalaciones', 'uses' => 'AdminController@instalaciones']);
    Route::get('panel-fut-si/alta/instalaciones', ['as' => 'panel-fut-si/alta/instalaciones', 'uses' => 'AdminController@altaInstalaciones']);
    Route::post('save-instalaciones', ['as' => 'save-instalaciones', 'uses' => 'InstalacionesController@saveInstalacion']);
    Route::post('save-imagenes-instalaciones', ['as' => 'save-imagenes-instalaciones', 'uses' => 'InstalacionesController@saveImageInstalacion']);
    Route::put('update-instalacion/{id?}', ['as' => 'update-instalacion', 'uses' => 'InstalacionesController@updateInstalacion']);

    //ORGANIZACIONES//
    Route::get('panel-fut-si/organizaciones', ['as' => 'panel-fut-si/organizacion', 'uses' => 'OrganizacionController@show']);
    Route::get('panel-fut-si/alta/organizacion', ['as' => 'panel-fut-si/alta/organizacion', 'uses' => 'OrganizacionController@altaOrganizacion']);
    Route::post('save-organizaciones', ['as' => 'save-organizaciones', 'uses' => 'OrganizacionController@saveOrganizacion']);
    Route::get('show-organizaciones', ['as' => 'show-organizaciones', 'uses' => 'OrganizacionController@showInfo']);
    Route::get('show-one-organizacion/{id?}', ['as' => 'show-one-organizacion', 'uses' => 'OrganizacionController@showOneInfo']);
    Route::put('update-organizacion/{id?}', ['as' => 'update-organizacion', 'uses' => 'OrganizacionController@updateOrganizacion']);
});
