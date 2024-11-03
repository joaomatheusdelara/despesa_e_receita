<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function index()
    {
        $despesas = Expense::all();
        return view('expenses.index', compact('despesas'));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required',
            'data' => 'required|date',
            'nota_fiscal' => 'nullable|string',
            'categoria' => 'required|string',
            'fornecedor' => 'nullable|string',
            'centro_custo' => 'nullable|string',
            'arquivo_nota_fiscal' => 'nullable|file',
            'descricao' => 'nullable|string',
            'valor' => 'required|numeric',
        ]);

        Expense::create($request->all());

        return redirect()->route('expenses.index')->with('success', 'Despesa & Receita criada com sucesso.');
    }

    public function edit($id)
    {
        $despesa = Expense::findOrFail($id);
        return view('expenses.edit', compact('despesa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required|string',
            'data' => 'required|date',
            'nota_fiscal' => 'nullable|string',
            'categoria' => 'required|string',
            'fornecedor' => 'nullable|string',
            'centro_custo' => 'nullable|string',
            'descricao' => 'nullable|string',
            'valor' => 'required|numeric',
        ]);
    
        $despesa = Expense::findOrFail($id);
        $despesa->update($request->all());
    
        return redirect()->route('expenses.index')->with('success', 'Despesa & Receita atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $despesa = Expense::findOrFail($id);
        $despesa->delete();

        return redirect()->route('expenses.index')->with('success', 'Despesa & Receita excluída com sucesso.');
    }

    public function dashboard(){
        // Mapeamento de números de meses para nomes em português
        $mesesPortugues = [
            1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
            5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
            9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
        ];
    
        // Agrupa os dados financeiros reais por mês e tipo
        $dadosFinanceiros = DB::table('expenses')
            ->select(
                DB::raw('MONTH(data) as mes'),
                'tipo',
                DB::raw('SUM(valor) as total')
            )
            ->groupBy('mes', 'tipo')
            ->get()
            ->map(function ($item) use ($mesesPortugues) {
                // Converte o número do mês para o nome do mês em português
                $item->mes = $mesesPortugues[$item->mes];
                return (array) $item;
            })->toArray();
    
        return view('dashboard', compact('dadosFinanceiros'));
    }
    
}
