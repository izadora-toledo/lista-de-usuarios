<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/importar', [UsuarioController::class, 'exibirPaginaImportacao'])->name('usuarios.importar');
Route::get('/importando', [UsuarioController::class, 'importarUsuarios'])->name('usuarios.importando');
Route::get('/importado', [UsuarioController::class, 'exibirPaginaImportado'])->name('usuarios.importado');
Route::get('/usuarios', [UsuarioController::class, 'exibirListaUsuarios'])->name('usuarios.index');
Route::get('/error', [UsuarioController::class, 'exibirPaginaErro'])->name('usuarios.error');

