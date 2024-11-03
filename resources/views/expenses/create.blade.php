@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Formulário Despesas Receita</h2>

    <form action="{{ route('expenses.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <!-- Campo Tipo -->
        <div class="mb-4">
            <label for="tipo" class="block text-gray-700 font-bold mb-2">Tipo</label>
            <select name="tipo" id="tipo" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="despesa">Despesa</option>
                <option value="receita">Receita</option>
            </select>
        </div>

        <!-- Campo Data -->
        <div class="mb-4">
            <label for="data" class="block text-gray-700 font-bold mb-2">Data</label>
            <input type="date" name="data" id="data" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Campo Nota Fiscal -->
        <div class="mb-4">
            <label for="nota_fiscal" class="block text-gray-700 font-bold mb-2">Nota Fiscal</label>
            <input type="text" name="nota_fiscal" id="nota_fiscal" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Campo Categoria -->
        <div class="mb-4">
            <label for="categoria" class="block text-gray-700 font-bold mb-2">Categoria</label>
            <input type="text" name="categoria" id="categoria" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Campo Fornecedor -->
        <div class="mb-4">
            <label for="fornecedor" class="block text-gray-700 font-bold mb-2">Fornecedor</label>
            <input type="text" name="fornecedor" id="fornecedor" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Campo Centro de Custo -->
        <div class="mb-4">
            <label for="centro_custo" class="block text-gray-700 font-bold mb-2">Centro de Custo</label>
            <input type="text" name="centro_custo" id="centro_custo" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Campo Arquivo Nota Fiscal -->
        <div class="mb-4">
            <label for="arquivo_nota_fiscal" class="block text-gray-700 font-bold mb-2">Arquivo Nota Fiscal</label>
            <input type="file" name="arquivo_nota_fiscal" id="arquivo_nota_fiscal" class="w-full">
        </div>

        <!-- Campo Descrição -->
        <div class="mb-4">
            <label for="descricao" class="block text-gray-700 font-bold mb-2">Descrição</label>
            <textarea name="descricao" id="descricao" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <!-- Campo Valor -->
        <div class="mb-4">
            <label for="valor" class="block text-gray-700 font-bold mb-2">Valor</label>
            <input type="number" name="valor" id="valor" step="0.01" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Botão Salvar -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                Salvar
            </button>
        </div>
    </form>
</div>
@endsection
