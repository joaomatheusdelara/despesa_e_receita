@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Despesas & Receitas</h2>

    <!-- Botão para adicionar nova despesa/receita -->
    <div class="mb-4">
        <a href="{{ route('expenses.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + Adicionar
        </a>
    </div>
    
    <form action="{{ route('expenses.index') }}" method="GET" class="mb-4">
        <label for="mes" class="block text-sm font-medium text-gray-700">Filtrar por Mês:</label>
            <select name="mes" id="mes">
                <option value="">Selecione o mês</option>
            @foreach ($meses as $numero => $nome)
                <option value="{{ $numero }}" {{ request('mes') == $numero ? 'selected' : '' }}>
                    {{ ucfirst($nome) }}
                </option>
            @endforeach
            </select>
        <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-md">Filtrar</button>
    </form>

    <!-- Tabela responsiva -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <thead class="bg-gray-100 shadow-lg"> 
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fornecedor</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($expenses as $despesa)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $despesa->nome }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $despesa->tipo }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $despesa->data }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $despesa->categoria }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $despesa->fornecedor }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $despesa->descricao }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $despesa->valor }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('expenses.edit', $despesa->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold">Editar</a>
                            <form action="{{ route('expenses.destroy', $despesa->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-bold ml-2">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        <!-- Paginação -->
        <div class="mt-4 flex justify-center">
            {{ $expenses->appends(['mes' => request('mes')])->links('vendor.pagination.tailwind') }}
        </div>
</div>
@endsection
