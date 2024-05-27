<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

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


Route::get('/', [UserController::class, 'index']) -> name('index.page');
Route::get('/login', [UserController::class, 'login']) -> name('login.page');

//Autenticação de usuário
Route::post('/auth', [UserController::class, 'auth']) -> name('auth.user');

//Atividades da página de login.page
Route::get('/contato', [UserController::class, 'contato']) -> name('contato');
Route::get('/home', [UserController::class, 'home']) -> name('home');
Route::get('/registro', [UserController::class, 'registro']) -> name('registro');



Route::middleware(['admin'])->group(function () {
    
    Route::get('/admin', [AdminController::class, 'index']) -> name('admin');
    
    Route::get('/negocio', [AdminController::class, 'ConsultarSupNegocio']) -> name('negocio');
    
    Route::get('/addOf', [AdminController::class, 'CadastrarSupNegocio']) -> name('addOf');

    Route::get('/sair', [AdminController::class, 'sair']) -> name('sair');
    
    Route::post('/cadofi', [AdminController::class, 'CadastrarSupNegocio']) -> name('cadofi');
    
    Route::get('/detNeg/{id}', [AdminController::class, 'DetalharSupNegocio']) -> name('detNeg');
    
    

});

Route::middleware(['client'])->group(function () {
    
    //CONSULTAR RELATORIO DE USUARIOS
        Route::get('/client', [ClientController::class, 'index']) -> name('client');

        Route::get('/usuPai', [ClientController::class, 'ConsultarSupUsuarioPainel']) -> name('usuPai');
        
        Route::get('/faq', [ClientController::class, 'ConsultarSupUsuarioPainel']) -> name('faq');
        
        Route::get('/sair', [ClientController::class, 'sair']) -> name('sair');
});