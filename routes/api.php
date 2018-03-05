<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('login', [ 'as' => 'login', 'uses' => 'API\PassportController@login' ]);
Route::get('login', [ 'as' => 'login', 'uses' => 'API\PassportController@login' ]);
Route::apiResource('users.weddings', 'WeddingController');


Route::group(['middleware' => ['auth:api', 'admin']], function(){
  Route::apiResource('users', 'UserController');
  Route::get('admin/allWeddings', 'AdminController@allWeddings');
  Route::get('admin/{wedding}', 'AdminController@showWedding');
});
