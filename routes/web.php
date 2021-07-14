<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Routing\UrlGenerator;
//use Auth;
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

// if (env('APP_ENV') === 'production') {
//     UrlGenerator::forceSchema('https');
// }

// UrlGenerator::forceSchema('https');

Route::get('/', function () {
    if(Auth::check()) {
        // dd(Auth::user()->campus);
        return redirect("/hawassa-university");
        // return redirect(Auth::user()->campus->slug);
    }
    return redirect('/logout');
});

Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/evange-control', 'SuperAdminController@index')
    ->middleware('super-admin')
    ->name('super_admin_home');

# Routes that campus-admin can access

// Route::get('/', function(){

// });

Route::get('/{campus}/counts', 'AdminController@index');
    // ->middleware('admin');

Route::get('/{campus}', 'AdminController@home')
    ->middleware('admin')
    ->name('admin_home');

Route::get('/{campus}/yetekebelu', 'YetekebeluController@index')->middleware('admin');
Route::get('/{campus}/yetemelesu', 'YetemelesuController@index')->middleware('admin');
Route::get('/{campus}/tesfa-yesetu', 'TesfaYesetuController@index')->middleware('admin');
Route::get('/{campus}/yesemu', 'YesemuController@index')->middleware('admin');

Route::get('/{campus}/sebaki-request', 'SebakiController@index')->middleware('admin');
Route::get('/{campus}/sebakis', 'SebakiController@index')->middleware('admin');
Route::post('/{campus}/approve-sebaki/{sebaki}-{slug}', 'SebakiController@approval')->middleware('admin');
Route::get('/{campus}/my-profile', 'AdminController@edit')->middleware('admin');
Route::get('/{campus}/activity-log', 'ActivityController@index')->middleware('admin');
Route::get('/{campus}/tesebakis', 'TesebakiController@index')->middleware('admin');
Route::post('/{campus}/admin-avatar/{user}', 'AdminController@update')->middleware('admin');
Route::put('/{campus}/edit-profile', 'AdminController@updateUser')->middleware('admin');
//Route::get('/{campus}/yesemu','TesebakiController@yesemu')->middleware('admin');

Route::get('/{campus}/evange', 'EvangeController@index');
// ->middleware('admin');
Route::post('/{campus}/evange','EvangeController@store');
// ->middleware('admin');
