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

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


Route::group(['middleware' => 'auth'], function () {

Route::get('/search', 'App\Http\Controllers\ApiController@search')->name('users.search');

Route::post('/edit-membro', [App\Http\Controllers\MembroController::class, 'editmembro'])->name('edit-membro');
Route::post('/cadastrar-membro', [App\Http\Controllers\MembroController::class, 'cadastrarMembro'])->name('cadastrar-membro');

Route::post('/salvar-evento', [App\Http\Controllers\EventoController::class, 'salvarEvento'])->name('salvarEvento');
Route::post('/salvar-foto', [App\Http\Controllers\EventoController::class, 'salvarFoto']);
Route::redirect('/home', '/user', 301);
Route::get('/getemails', [App\Http\Controllers\OptionEmailSender::class, 'getemails'])->name('getemails');
Route::get('/getemailsall', [App\Http\Controllers\OptionEmailSender::class, 'getemailsall'])->name('getemailsall');
Route::post('/criar-lista', [App\Http\Controllers\OptionEmailSender::class, 'criarlista'])->name('criarlista');
Route::get('/ver-lista', [App\Http\Controllers\OptionEmailSender::class, 'verlista'])->name('verlista');
Route::post('/remover-lista', [App\Http\Controllers\OptionEmailSender::class, 'removerlista'])->name('removerlista');
Route::post('/add-a-lista', [App\Http\Controllers\OptionEmailSender::class, 'addalista'])->name('addalista');
Route::post('/coletarlista', [App\Http\Controllers\OptionEmailSender::class, 'coletarLista'])->name('coletarLista');

Route::post('/enviar-email', [App\Http\Controllers\PHPMailerController::class, 'enviarEmail'])->name('enviarEmail');;

Route::get('/eventos', ['as' => 'eventos', 'uses' => 'App\Http\Controllers\PageController@eventos']);
Route::get('/get-mediadores', [App\Http\Controllers\EventoController::class, 'getMediadores']);
Route::delete('/remover-evento/{evento_id}', 'App\Http\Controllers\EventoController@removerEvento')->name('remover-evento');
Route::post('/remover-presenca', 'App\Http\Controllers\EventoController@removerPresenca')->name('remover-presenca');
Route::post('/marcar-presenca', 'App\Http\Controllers\EventoController@marcarPresenca')->name('marcar-presenca');
Route::get('/api/user/{id_user}', [App\Http\Controllers\ApiController::class, 'find_user2'])->name('marcar-presenca');

Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
    
});

