<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ExpenseController::class, 'dashboard'])->name('dashboard');
    Route::get('/despesas-receitas', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::get('/despesas-receitas/create', [ExpenseController::class, 'create'])->name('expenses.create');
    Route::post('/despesas-receitas', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::get('/despesas-receitas/{id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
    Route::put('/despesas-receitas/{id}', [ExpenseController::class, 'update'])->name('expenses.update');
    Route::delete('/despesas-receitas/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');

});

