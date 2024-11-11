<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        // Configura o locale para exibir os meses em português
        Carbon::setLocale('pt_BR');

        // Recebe os filtros de mês e tipo selecionados
        $mes = $request->input('mes');
        $tipo = $request->input('tipo');

        // Cria uma query base e aplica os filtros, se fornecidos
        $expenses = Expense::query();

        if ($mes) {
            $expenses->whereMonth('data', $mes); // Usa o valor numérico diretamente
        }

        if ($tipo) {
            $expenses->where('tipo', $tipo); // Filtra por tipo (despesa ou receita)
        }

        // Pagina os resultados, com 10 itens por página
        $expenses = $expenses->paginate(10);

        // Gera a lista de meses em português para o filtro
        $meses = [];
        foreach (range(1, 12) as $i) {
            $meses[$i] = Carbon::create()->month($i)->translatedFormat('F');
        }

        // Tipos de transações para o filtro (despesa ou receita)
        $tipos = ['despesa' => 'Despesa', 'receita' => 'Receita'];

        return view('expenses.index', compact('expenses', 'mes', 'meses', 'tipo', 'tipos'));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|string|in:despesa,receita',
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
            'nome' => 'required|string|max:255',
            'tipo' => 'required|string|in:despesa,receita',
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

    public function dashboard()
    {
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
