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

    Route::get('getuserslist/{per_page?}', 'UsersController@getUserList');
    Route::get('getuser/{id}', 'UsersController@getUserDetails');
    Route::post('updateuser', 'UsersController@updateUser');
    Route::post('createuser', 'UsersController@createUser');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
