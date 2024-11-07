@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1 hstack gap-2">
            <h2 class="mt-3">Dashboard</h2>
            <ol class="breadcrumb mt-3 mb-3 ms-auto">
                <li class="breadcrumb active mt-3">Dashbard</li>
            </ol>
        </div>
        <div class="row">
            @foreach($usersRank as $userRank)
                <div class="col-xl-3 col-md-6 mb-2">
                    <div class="card">
                        <img class="img-fluid" src="storage/{{ $userRank->image }}" alt="{{ $userRank->nickname }}"
                             style="width: 800px; height: 250px">
                        <div class="card-body">
                            <h5 >{{ $userRank->nickname }}</h5>
                            <span>Derrotas: {{ $userRank->total }}</span>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
    <div class="row mt-3">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header text-center">
                    Partidas
                </div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="50"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header text-center">
                    Derrota dos jogadores
                </div>
                <div class="card-body">
                    <canvas id="myBarChart" width="100%" height="50"></canvas>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

@push('graficos')
    <script>
        var ctx = document.getElementById('myAreaChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [{{ $defeatAno }}],
                datasets: [{
                    label: [{!! $defeatLabel !!}],
                    data: [{{ $defeatTotal }}],
                    backgroundColor: [
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        }
                    }],
                    xAxes: [{
                        categoryPercentage: 0.5,
                        barPercentage: 0.2
                    }],
                }
            }
        });

        /* Gráfico 02 */
        var ctx = document.getElementById('myBarChart');
        var myBarChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [{!! $userLabel !!}],
                datasets: [{
                    label: 'Visitas',
                    data: [{{ $userTotal }}],
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 159, 64)',
                        'rgba(0,0,255)',
                        'rgba(176,196,222)',
                        'rgba(28,28,28)',
                    ]
                }]
            },
            options: {
                cutoutPercentage: 70
            }
        });

    </script>
@endpush
