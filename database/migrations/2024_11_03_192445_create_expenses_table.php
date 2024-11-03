<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('tipo'); // Coluna 'tipo'
            $table->date('data'); // Coluna 'data'
            $table->string('nota_fiscal')->nullable(); // Coluna 'nota_fiscal'
            $table->string('categoria'); // Coluna 'categoria'
            $table->string('fornecedor')->nullable(); // Coluna 'fornecedor'
            $table->string('centro_custo')->nullable(); // Coluna 'centro_custo'
            $table->text('descricao')->nullable(); // Coluna 'descricao'
            $table->decimal('valor', 10, 2); // Coluna 'valor'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
}