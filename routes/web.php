<?php

use Illuminate\Support\Facades\Route;
use App\Models\Aluno;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\EmprestimoController;

Route::get('/', function () {
    return view('index');
})->name('raiz');

# ROTAS DE ALUNO ==================================================================================
Route::get('/aluno',[AlunoController::class, 'index'])->name('aluno.index');
Route::get('/aluno/create',[AlunoController::class, 'create'])->name('aluno.create');
Route::post('/aluno',[AlunoController::class, 'store'])->name('aluno.store');
Route::get('/aluno/{id}/view',[AlunoController::class, 'view'])->name('aluno.view');
Route::post('/aluno/{id}/update',[AlunoController::class, 'update'])->name('aluno.update');
Route::get('/aluno/{id}/destroy',[AlunoController::class, 'destroy'])->name('aluno.destroy');
Route::get('/aluno/search',[AlunoController::class, 'search'])->name('aluno.search');

# ROTAS DE LIVRO ==================================================================================
Route::get('/livro',[LivroController::class, 'index'])->name('livro.index');
Route::get('/livro/create',[LivroController::class, 'create'])->name('livro.create');
Route::post('/livro',[LivroController::class, 'store'])->name('livro.store');
Route::get('/livro/{id}/destroy',[LivroController::class, 'destroy'])->name('livro.destroy');
Route::get('/livro/{id}/edit',[LivroController::class,'edit'])->name('livro.edit');
Route::post('/livro/{id}/update',[LivroController::class, 'update'])->name('livro.update');
Route::get('/livro/search',[LivroController::class,'search'])->name('livro.search');

# ROTAS DE TELEFONE ===============================================================================
Route::get('/telefone',[TelefoneController::class, 'index'])->name('telefone.index');
Route::post('/aluno/{id}/telefone',[AlunoController::class, 'storeTelefone'])->name('aluno.telefone.store');
Route::get('/telefone/{id}',[AlunoController::class, 'destroyTelefone'])->name('aluno.telefone.destroy');



# ROTAS DE EMPRÉSTIMO =============================================================================
Route::get('/emprestimo',[EmprestimoController::class, 'index'])->name('emprestimo.index');
Route::get('/emprestimo/create',[EmprestimoController::class, 'create'])->name('emprestimos.create');
Route::post('/emprestimo/store',[EmprestimoController::class, 'store'])->name('emprestimo.store');
Route::get('/emprestimo/{aluno_id}/{livro_id}/destroy', [EmprestimoController::class ,'destroy'])->name('emprestimo.destroy');
Route::get('/emprestimo/{aluno_id}/{livro_id}/edit', [EmprestimoController::class ,'edit'])->name('emprestimo.edit');
Route::post('/emprestimos/update/{aluno_id}/{livro_id}', [EmprestimoController::class, 'update'])->name('emprestimo.update');
Route::get('/emprestimos/search',[EmprestimoController::class, 'search'])->name('emprestimo.search');