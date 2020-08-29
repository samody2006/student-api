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
Route::get('students', 'ApiController@getAllStudents');
Route::get('students/{id}', 'ApiController@getStudent');
Route::post('students', 'ApiController@createStudent');
Route::put('students/{id}', 'ApiController@updateStudent');
Route::delete('students/{id}','ApiController@deleteStudent');


Route::get('/login','ApiController@accessToken');
Route::group(['middleware' => ['web','auth:api']], function()
{
   Route::post('/todo/','ApiController@store');
   Route::get('/todo/','ApiController@index');
   Route::get('/todo/{todo}','ApiController@show');
   Route::put('/todo/{todo}','ApiController@update');
   Route::delete('/todo/{todo}','ApiController@destroy');
});