@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Editar Despesa/Receita</h2>

    <form action="{{ route('expenses.update', $despesa->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Campo Tipo -->
        <div class="mb-4">
            <label for="tipo" class="block text-gray-700 font-bold mb-2">Tipo</label>
            <select name="tipo" id="tipo" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="despesa" {{ $despesa->tipo == 'despesa' ? 'selected' : '' }}>Despesa</option>
                <option value="receita" {{ $despesa->tipo == 'receita' ? 'selected' : '' }}>Receita</option>
            </select>
        </div>

        <!-- Campo Data -->
        <div class="mb-4">
            <label for="data" class="block text-gray-700 font-bold mb-2">Data</label>
            <input type="date" name="data" id="data" value="{{ $despesa->data }}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Campo Nota Fiscal -->
        <div class="mb-4">
            <label for="nota_fiscal" class="block text-gray-700 font-bold mb-2">Nota Fiscal</label>
            <input type="text" name="nota_fiscal" id="nota_fiscal" value="{{ $despesa->nota_fiscal }}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Campo Categoria -->
        <div class="mb-4">
            <label for="categoria" class="block text-gray-700 font-bold mb-2">Categoria</label>
            <input type="text" name="categoria" id="categoria" value="{{ $despesa->categoria }}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Campo Fornecedor -->
        <div class="mb-4">
            <label for="fornecedor" class="block text-gray-700 font-bold mb-2">Fornecedor</label>
            <input type="text" name="fornecedor" id="fornecedor" value="{{ $despesa->fornecedor }}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Campo Centro de Custo -->
        <div class="mb-4">
            <label for="centro_custo" class="block text-gray-700 font-bold mb-2">Centro de Custo</label>
            <input type="text" name="centro_custo" id="centro_custo" value="{{ $despesa->centro_custo }}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Campo Descrição -->
        <div class="mb-4">
            <label for="descricao" class="block text-gray-700 font-bold mb-2">Descrição</label>
            <textarea name="descricao" id="descricao" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $despesa->descricao }}</textarea>
        </div>

        <!-- Campo Valor -->
        <div class="mb-4">
            <label for="valor" class="block text-gray-700 font-bold mb-2">Valor</label>
            <input type="number" name="valor" id="valor" value="{{ $despesa->valor }}" step="0.01" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Botão Atualizar -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                Atualizar
            </button>
        </div>
    </form>
</div>
@endsection
