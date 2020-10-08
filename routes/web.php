<?php

use App\Http\Controllers\studentcurd;
use Dotenv\Regex\Success;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome') -> with('data','IT Administrator');
});

Route::group(['prefix' => 'admin'], function () {
    
    Route::get('test', 'Firstcont@show' );
    Route::get('test2', 'Firstcont@show2' ) ->middleware('auth');
    
});

Route::resource('news', 'newscont');

Route::get('index', 'Firstcont@getindex');

Route::get('landing', function () {
    return view('landing');
});

Route::get('land', function () {
    return view('land');
});

Auth::routes(['verify'=>true ]);


Route::get('/home', 'HomeController@index')->name('home');



//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
Route::get('stucurd', 'studentcurd@add')->middleware('auth');


Route::post('store', 'studentcurd@create') -> name('add');
//after success inserted 
//Route::get('stucurd','studentcurd@add') ->middleware('auth')->name('inserted');

});