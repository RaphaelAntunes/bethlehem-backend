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

Route::post('/login', [App\Http\Controllers\JWTAuthController::class,'login']);

Route::post('/edit-membro', [App\Http\Controllers\MembroController::class, 'editmembro'])->name('edit-membro');
Route::post('/cadastrar-membro', [App\Http\Controllers\MembroController::class, 'cadastrarMembro'])->name('cadastrar-membro');
Route::post('/salvar-foto', [App\Http\Controllers\EventoController::class, 'salvarFoto']);


route::group(['middleware'=> ['apiJwt']], function () {
Route::post('/me', [App\Http\Controllers\JWTAuthController::class,'me']);
Route::post('/logout', [App\Http\Controllers\JWTAuthController::class,'logout']);
Route::get('/getemailsall', [App\Http\Controllers\OptionEmailSender::class, 'getemailsall'])->name('getemailsall');
Route::get('/users', [App\Http\Controllers\UserController::class, 'indexapi']);
Route::get('/getemails', [App\Http\Controllers\OptionEmailSender::class, 'getemails'])->name('getemails');
Route::post('/criar-lista', [App\Http\Controllers\OptionEmailSender::class, 'criarlista'])->name('criarlista');
Route::get('/ver-lista', [App\Http\Controllers\OptionEmailSender::class, 'verlista'])->name('verlista');
Route::post('/remover-lista', [App\Http\Controllers\OptionEmailSender::class, 'removerlista'])->name('removerlista');
Route::post('/add-a-lista', [App\Http\Controllers\OptionEmailSender::class, 'addalista'])->name('addalista');
Route::post('/coletarlista', [App\Http\Controllers\OptionEmailSender::class, 'coletarLista'])->name('coletarLista');
Route::post('/enviar-email', [App\Http\Controllers\PHPMailerController::class, 'enviarEmail'])->name('enviarEmail');
Route::get('/eventos', ['as' => 'eventos', 'uses' => 'App\Http\Controllers\PageController@eventos']);
Route::get('/get-mediadores', [App\Http\Controllers\EventoController::class, 'getMediadores']);
Route::delete('/remover-evento/{evento_id}', 'App\Http\Controllers\EventoController@removerEvento')->name('remover-evento');
Route::post('/remover-presenca', 'App\Http\Controllers\EventoController@removerPresenca')->name('remover-presenca');
Route::post('/marcar-presenca', 'App\Http\Controllers\EventoController@marcarPresenca')->name('marcar-presenca');
Route::get('/user/{id_user}', [App\Http\Controllers\ApiController::class, 'find_user2'])->name('marcar-presenca');

Route::post('/salvar-evento', [App\Http\Controllers\EventoController::class, 'salvarEvento'])->name('salvarEvento');

});

