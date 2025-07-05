@extends('layouts.app')
@section('link')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>

        canvas {
            /*background: #f9f9f9;*/
            border-radius: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-xl-8">
                <div class="card shadow-sm text-center">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Mis Skills</h5>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto" style="width: 500px;">
                            <canvas id="skillsEstudiante"  style="width: 500px; height: 500px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="mb-6 grid gap-6 sm:grid-cols-2 xl:grid-cols-6">
        <div class="panel h-full pb-0 sm:col-span-2 xl:col-span-1">
            <h5 class="mb-5 text-lg font-semibold dark:text-white-light">Actividades Recientes</h5>

            <div class="perfect-scrollbar relative -mr-3 mb-4 h-[290px] pr-3">
                <div class="cursor-pointer text-sm">
                    @foreach($examenes as $examen)
                        <div class="group relative flex items-center py-1.5">
                            <div class="h-1.5 w-1.5 rounded-full bg-primary ltr:mr-1 rtl:ml-1.5"></div>
                            <div class="flex-1">{{$examen->curso->nombre}}</div>
                            <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">{{Util::tiempoHumano($examen->created_at)}}</div>

                            @if($examen->nota > 10.5)
                                <span
                                    class="badge badge-outline-success absolute bg-success-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]"
                                >{{$examen->nota}}</span
                                >
                            @else
                                <span
                                    class="badge badge-outline-danger absolute bg-danger-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]"
                                >{{$examen->nota}}</span
                                >
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>
            <div class="border-t border-white-light dark:border-white/10">
                <a href="{{route('estudiante.examen.historial')}}" class="group group flex items-center justify-center p-4 font-semibold hover:text-primary">
                    View All
                    <svg
                        class="h-4 w-4 transition duration-300 group-hover:translate-x-1 ltr:ml-1 rtl:mr-1 rtl:rotate-180 rtl:group-hover:-translate-x-1"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M4 12H20M20 12L14 6M20 12L14 18"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </a>
            </div>
        </div>




        <div class="panel h-full pb-0 sm:col-span-2 xl:col-span-1">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Razonamiento matemático</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="razonamientoChart"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel h-full pb-0 sm:col-span-2 xl:col-span-1">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Comunicación</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="comunicacionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel h-full pb-0 sm:col-span-2 xl:col-span-1">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Historia</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="historiaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel h-full pb-0 sm:col-span-2 xl:col-span-1">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Biología</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="biologiaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel h-full pb-0 sm:col-span-2 xl:col-span-1">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Química</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="quimicaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>

@endsection
@section('script')
    <script>
        fetch('/service/estudiante/skill')
            .then(res => res.json())
            .then(res => {
                const ctx = document.getElementById('skillsEstudiante').getContext('2d');
                new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: res.labels,
                        datasets: [{
                            label: 'Notas de examenes',
                            data: res.data,
                            backgroundColor: 'rgba(0, 123, 255, 0.3)',
                            borderColor: 'rgba(0, 123, 255, 1)',
                            borderWidth: 2,
                            pointBackgroundColor: 'rgba(0, 123, 255, 1)',
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            r: {
                                min: 0,
                                max: 20,
                                ticks: {
                                    display: false
                                },
                                grid: {
                                    circular: true
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                position: 'top'
                            }
                        }
                    }
                });
            });

    </script>

    <script>
            document.addEventListener("DOMContentLoaded", function () {
            fetch('/service/estudiante/cursos')
                .then(res => res.json())
                .then(data => {
                    const notasrz = data['rz'].map(e => e.nota);
                    const fechasrz = data['rz'].map(e => {
                        const d = new Date(e.created_at);
                        return d.toLocaleDateString('en-US', { month: 'short', day: 'numeric' }); // Ej: "Jun 25"
                    });

                    const ctx1 = document.getElementById('razonamientoChart').getContext('2d');
                    new Chart(ctx1, {
                        type: 'line',
                        data: {
                            labels: fechasrz,
                            datasets: [{
                                label: 'Notas de Razonamiento',
                                data: notasrz,
                                borderColor: 'rgba(13, 110, 253, 1)',
                                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                                tension: 0.4,
                                fill: true,
                                pointRadius: 4,
                                pointBackgroundColor: 'rgba(13, 110, 253, 1)'
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 20
                                }
                            },
                            plugins: {
                                legend: {
                                    position: 'top'
                                },
                                tooltip: {
                                    mode: 'index',
                                    intersect: false
                                }
                            }
                        }
                    });


                    const notasco = data['co'].map(e => e.nota);
                    const fechasco = data['co'].map(e => {
                        const d = new Date(e.created_at);
                        return d.toLocaleDateString('en-US', { month: 'short', day: 'numeric' }); // Ej: "Jun 25"
                    });

                    const ctx2 = document.getElementById('comunicacionChart').getContext('2d');
                    new Chart(ctx2, {
                        type: 'line',
                        data: {
                            labels: fechasco,
                            datasets: [{
                                label: 'Notas de Comunicación',
                                data: notasco,
                                borderColor: 'rgba(13, 110, 253, 1)',
                                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                                tension: 0.4,
                                fill: true,
                                pointRadius: 4,
                                pointBackgroundColor: 'rgba(13, 110, 253, 1)'
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 20
                                }
                            },
                            plugins: {
                                legend: {
                                    position: 'top'
                                },
                                tooltip: {
                                    mode: 'index',
                                    intersect: false
                                }
                            }
                        }
                    });


                    const notashi = data['hi'].map(e => e.nota);
                    const fechashi = data['hi'].map(e => {
                        const d = new Date(e.created_at);
                        return d.toLocaleDateString('en-US', { month: 'short', day: 'numeric' }); // Ej: "Jun 25"
                    });

                    const ctx3 = document.getElementById('historiaChart').getContext('2d');
                    new Chart(ctx3, {
                        type: 'line',
                        data: {
                            labels: fechashi,
                            datasets: [{
                                label: 'Notas de Historia',
                                data: notashi,
                                borderColor: 'rgba(13, 110, 253, 1)',
                                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                                tension: 0.4,
                                fill: true,
                                pointRadius: 4,
                                pointBackgroundColor: 'rgba(13, 110, 253, 1)'
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 20
                                }
                            },
                            plugins: {
                                legend: {
                                    position: 'top'
                                },
                                tooltip: {
                                    mode: 'index',
                                    intersect: false
                                }
                            }
                        }
                    });

                    const notasbi = data['bi'].map(e => e.nota);
                    const fechasbi = data['bi'].map(e => {
                        const d = new Date(e.created_at);
                        return d.toLocaleDateString('en-US', { month: 'short', day: 'numeric' }); // Ej: "Jun 25"
                    });

                    const ctx4 = document.getElementById('biologiaChart').getContext('2d');
                    new Chart(ctx4, {
                        type: 'line',
                        data: {
                            labels: fechasbi,
                            datasets: [{
                                label: 'Notas de Biología',
                                data: notasbi,
                                borderColor: 'rgba(13, 110, 253, 1)',
                                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                                tension: 0.4,
                                fill: true,
                                pointRadius: 4,
                                pointBackgroundColor: 'rgba(13, 110, 253, 1)'
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 20
                                }
                            },
                            plugins: {
                                legend: {
                                    position: 'top'
                                },
                                tooltip: {
                                    mode: 'index',
                                    intersect: false
                                }
                            }
                        }
                    });

                    const notasqui = data['qui'].map(e => e.nota);
                    const fechasqui = data['qui'].map(e => {
                        const d = new Date(e.created_at);
                        return d.toLocaleDateString('en-US', { month: 'short', day: 'numeric' }); // Ej: "Jun 25"
                    });

                    const ctx5 = document.getElementById('quimicaChart').getContext('2d');
                    new Chart(ctx5, {
                        type: 'line',
                        data: {
                            labels: fechasqui,
                            datasets: [{
                                label: 'Notas de Química',
                                data: notasqui,
                                borderColor: 'rgba(13, 110, 253, 1)',
                                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                                tension: 0.4,
                                fill: true,
                                pointRadius: 4,
                                pointBackgroundColor: 'rgba(13, 110, 253, 1)'
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 20
                                }
                            },
                            plugins: {
                                legend: {
                                    position: 'top'
                                },
                                tooltip: {
                                    mode: 'index',
                                    intersect: false
                                }
                            }
                        }
                    });
                });
        });
    </script>
@endsection
