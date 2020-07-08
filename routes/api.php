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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::middleware('auth:sanctum')->get('users', "UserController@users");

Route::middleware('auth:sanctum')->group( function (){
    Route::resource('users', 'UserController', ['except' => ['create', 'edit', 'store']]);
});

//Route::resource('teachers', 'TeacherController', ['only' => ['index', 'show']]);
Route::resource('students', 'StudentController', ['only' => ['index', 'show']]);
Route::resource('clases', 'ClaseController', ['only' => ['index', 'show']]);
Route::resource('materias', 'MateriaController', ['only' => ['index', 'show']]);

Route::post('login', "UserController@login");
Route::post('register', "UserController@store");