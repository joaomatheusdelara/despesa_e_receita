<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
   
        <div class="min-h-screen flex flex-col justify-between">
            <div class="flex-grow py-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
                <h2 class="text-2xl font-bold mb-4">Resumo Financeiro Mensal</h2>
                
                <!-- Canvas do Gráfico -->
                <canvas id="financeChart" style="width: 100%; height: 400px;"></canvas>
            </div>
        </div>



    </div>

    <!-- Inclua o Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dadosFinanceiros = @json($dadosFinanceiros);

            const meses = Array.from(new Set(dadosFinanceiros.map(d => d.mes)));
            const receitas = meses.map(mes => {
                const item = dadosFinanceiros.find(d => d.mes === mes && d.tipo === 'receita');
                return item ? item.total : 0;
            });
            const despesas = meses.map(mes => {
                const item = dadosFinanceiros.find(d => d.mes === mes && d.tipo === 'despesa');
                return item ? item.total : 0;
            });

            const ctx = document.getElementById('financeChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
    data: {
        labels: meses,
        datasets: [
            {
                label: 'Receitas',
                data: receitas,
                backgroundColor: 'rgba(54, 162, 235, 0.6)', // Azul mais vivo com opacidade
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Despesas',
                data: despesas,
                backgroundColor: 'rgba(255, 99, 132, 0.6)', // Rosa com opacidade
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    color: '#4A4A4A', // Cor dos números no eixo Y
                    font: {
                        size: 14,
                        family: 'Arial',
                        weight: 'bold'
                    }
                },
                grid: {
                    color: '#E5E5E5' // Cor da grade horizontal
                }
            },
            x: {
                ticks: {
                    color: '#4A4A4A', // Cor dos rótulos no eixo X
                    font: {
                        size: 14,
                        family: 'Arial',
                        weight: 'bold'
                    }
                },
                grid: {
                    display: false // Remover a grade vertical para um visual mais limpo
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    color: '#333', // Cor do texto da legenda
                    font: {
                        size: 14,
                        family: 'Arial',
                        weight: 'bold'
                    },
                    padding: 20 // Espaçamento ao redor dos itens da legenda
                }
            },
            tooltip: {
                backgroundColor: '#333', // Cor de fundo do tooltip
                titleFont: {
                    family: 'Arial',
                    weight: 'bold',
                    size: 14
                },
                bodyFont: {
                    family: 'Arial',
                    size: 12
                },
                padding: 10,
                cornerRadius: 5
            }
        }
    }
            });
        });

    </script>


     </x-slot>
     
</x-app-layout>
