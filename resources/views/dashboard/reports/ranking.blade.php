<!-- resources/views/reports/ranking.blade.php -->

@extends('dashboard.master.app')

@section('content')
<div class="container mx-auto h-[800px]">
    <h1 class="text-2xl font-bold mb-4">Ranking de Saídas</h1>
    <canvas id="rankingChart" width="400" height="400"></canvas>
</div>

<script>
    var productNames = {!! json_encode($productsData->pluck('name')) !!};
    var differences = {!! json_encode($productsData->pluck('difference')) !!};

    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('rankingChart').getContext('2d');
        var rankingChart = new Chart(ctx, {
            type: 'pie', // Alterando para gráfico de pizza
            data: {
                labels: productNames,
                datasets: [{
                    label: 'Saídas', // Apenas para fins informativos
                    data: differences, // Utilizando as diferenças como dados
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)', // Cor para a primeira fatia
                        'rgba(54, 162, 235, 0.2)', // Cor para a segunda fatia
                        'rgba(255, 206, 86, 0.2)', // Cor para a terceira fatia, e assim por diante
                        // Adicione mais cores conforme necessário para o número de produtos
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)', // Cor da borda para a primeira fatia
                        'rgba(54, 162, 235, 1)', // Cor da borda para a segunda fatia
                        'rgba(255, 206, 86, 1)', // Cor da borda para a terceira fatia, e assim por diante
                        // Adicione mais cores conforme necessário para o número de produtos
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                // Aqui você pode adicionar opções específicas para o gráfico de pizza, como legendas, animações, etc.
            }
        });
    });
</script>



@endsection
