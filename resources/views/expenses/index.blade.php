@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-7xl">
    <h2 class="text-3xl font-bold mb-6">Despesas & Receitas</h2>

    <!-- Botão para adicionar nova despesa/receita -->
    <div class="mb-6">
        <a href="{{ route('expenses.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg">
            + Adicionar
        </a>
    </div>
    
    <!-- Formulário de filtro por mês -->
    <form action="{{ route('expenses.index') }}" method="GET" class="mb-6 flex items-center">
        <label for="mes" class="text-sm font-medium text-gray-700 mr-2">Filtrar por Mês:</label>
        <select name="mes" id="mes" class="border-gray-300 rounded-md text-sm py-2 px- mr-4 shadow-sm">
            <option value="">Selecione o mês</option>
            @foreach ($meses as $numero => $nome)
                <option value="{{ $numero }}" {{ request('mes') == $numero ? 'selected' : '' }}>
                    {{ ucfirst($nome) }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-md">Filtrar</button>
    </form>

    <!-- Tabela responsiva -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left font-semibold text-gray-600">Nome</th>
                    <th class="px-6 py-4 text-left font-semibold text-gray-600">Tipo</th>
                    <th class="px-6 py-4 text-left font-semibold text-gray-600">Data</th>
                    <th class="px-6 py-4 text-left font-semibold text-gray-600">Categoria</th>
                    <th class="px-6 py-4 text-left font-semibold text-gray-600">Fornecedor</th>
                    <th class="px-6 py-4 text-left font-semibold text-gray-600">Descrição</th>
                    <th class="px-6 py-4 text-left font-semibold text-gray-600">Valor</th>
                    <th class="px-6 py-4 text-left font-semibold text-gray-600">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($expenses as $despesa)
                    <tr>
                        <td class="px-6 py-4">{{ $despesa->nome }}</td>
                        <td class="px-6 py-4">{{ $despesa->tipo }}</td>
                        <td class="px-6 py-4">{{ $despesa->data }}</td>
                        <td class="px-6 py-4">{{ $despesa->categoria }}</td>
                        <td class="px-6 py-4">{{ $despesa->fornecedor }}</td>
                        <td class="px-6 py-4">{{ $despesa->descricao }}</td>
                        <td class="px-6 py-4">{{ number_format($despesa->valor, 2, ',', '.') }}</td>
                        <td class="px-6 py-4 flex items-center space-x-2">
                            <!-- Ícone de Editar -->
                            <a href="{{ route('expenses.edit', $despesa->id) }}" class="text-yellow-400 hover:text-yellow-500 font-bold">
                                <i class="fas fa-edit"></i> <!-- Cor de edição -->
                            </a>
                            <!-- Ícone de Excluir -->
                            <form action="{{ route('expenses.destroy', $despesa->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600 font-bold">
                                    <i class="fas fa-trash-alt"></i> <!-- Cor de exclusão -->
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginação -->
    <div class="mt-6 flex justify-center">
        {{ $expenses->appends(['mes' => request('mes')])->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection
