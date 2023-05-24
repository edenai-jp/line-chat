<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/store', 'App\Http\Controllers\LineUserController@store');
Route::post('/home', 'App\Http\Controllers\LineUserController@index');
Route::post('/init', 'App\Http\Controllers\LineChatController@index');
Route::post('/chat', 'App\Http\Controllers\LineChatController@chat');
