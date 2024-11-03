<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo', 
        'data', 
        'nota_fiscal', 
        'categoria', 
        'fornecedor', 
        'centro_custo', 
        'arquivo_nota_fiscal', 
        'descricao', 
        'valor'
    ];
}
