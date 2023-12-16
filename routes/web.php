<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!\
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', 'App\Http\Controllers\ApiController@search')->name('users.search');
Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);

Route::get('/swagger', '\L5Swagger\Http\Controllers\SwaggerController@index');

