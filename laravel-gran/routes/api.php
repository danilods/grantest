<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('orgaos', 'OrgaosAPIController');

Route::resource('bancas', 'BancasAPIController');

Route::resource('assuntos', 'AssuntosAPIController');

Route::resource('questoes', 'QuestoesAPIController');

Route::resource('item_questoes', 'ItemQuestoesAPIController');

Route::resource('itens_questoes', 'ItensQuestoesAPIController');

Route::resource('programa', 'ProgramaEstudoAPIController');

Route::resource('questoes/{idbanca}/{idOrgao}', 'QuestoesAPIController');


