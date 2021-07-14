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
Route::post('/register-sebaki', 'Api\SebakiController@store');
Route::post('/login-sebaki', 'Api\SebakiController@login');
Route::post('/add-tesebaki', 'Api\SebakiController@addTesebaki');
Route::put('/sebaki-profile/{sebaki}', 'Api\SebakiController@update');
Route::put('/change-password/{sebaki}', 'Api\SebakiController@updatePassword');
Route::put('/profile-image/{sebaki}', 'Api\SebakiController@updateImage');
Route::post('/add-yesema', 'Api\SebakiController@addYesema');

Route::get('/refresh-me/{sebaki}', 'Api\SebakiController@refreshAccount');
Route::get('/{campus}/evange-info', 'EvangeController@index');
Route::get('/{campus}/evange', 'EvangeController@index');




// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
