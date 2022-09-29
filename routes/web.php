<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\TestController;
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

Route::get('/', 'TopController@index');
Route::post('/category', 'TopController@category');
Route::get('/map', 'MapController@maps');
Route::get('/test', 'TestController@test3');

Route::get('/test2', 'TestController@test2');
Route::post('/test2', 'TestController@test2');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
