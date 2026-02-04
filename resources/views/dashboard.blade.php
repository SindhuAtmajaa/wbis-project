@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> 
        {{ $title }}
    </h1>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                TOTAL ORDER</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalOrder }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                JUMLAH NOMINAL</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($totalSeluruhNominal, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                ORDER TERTINGGI</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $namaCabangTeraktif }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                NOMINAL ORDER TERBANYAK</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($nominalTertinggi, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bar Chart Total Nominal Per Cabang -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">NOMINAL TERBANYAK</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar" style="height: 320px;">
                        <canvas id="nominalBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bar Chart Jumlah Order -->
    <div class="row">
        <div class="col-xl-9 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">JUMLAH ORDER</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar" style="height:275px">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bar Chart Presentase Order SMG -->
        <div class="col-xl-3 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">PRESENTASE ORDER SMG</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie">
                        <canvas id="myPieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-9 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">REKAP KJPP</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar" style="height:250px">
                        <canvas id="kjppBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center">REKAP VERIFIKATOR</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar" style="height:250px">
                        <canvas id="verifBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // BAR CHART TOTAL NOMINAL PER CABANG
    var ctxNominal = document.getElementById("nominalBarChart");
    new Chart(ctxNominal, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labelsNominal) !!},
            datasets: [{
                label: "Total Nominal",
                backgroundColor: "#1cc88a",
                hoverBackgroundColor: "#17a673",
                data: {!! json_encode($valuesNominal) !!},
            }],
        },
        options: {
            maintainAspectRatio: false,
            legend: { display: false },
            scales: {
                xAxes: [{ gridLines: { display: false } }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        maxTicksLimit: 5,
                        // Format angka di sumbu Y menjadi Ribuan/Jutaan
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }]
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var label = data.datasets[tooltipItem.datasetIndex].label || '';
                        return label + ': Rp ' + tooltipItem.yLabel.toLocaleString('id-ID');
                    }
                }
            }
        }
    });

    // 1. BAR CHART (Seluruh Cabang)
    var ctxBar = document.getElementById("myBarChart");
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labelsBar) !!},
            datasets: [{
                label: "Jumlah Order",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                data: {!! json_encode($valuesBar) !!},
            }],
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false // Menghilangkan legenda biru "Jumlah Order"
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false, // Menghilangkan garis vertikal agar lebih bersih
                        drawBorder: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        maxTicksLimit: 5, // Membatasi jumlah garis background (hanya 5 garis)
                        padding: 10,
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }]
            },
        }
    });

    // 2. PIE CHART (Doughnut)
    var ctxPie = document.getElementById("myPieChart");
    new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($labelsPie) !!},
            datasets: [{
                data: {!! json_encode($valuesPie) !!},
                backgroundColor: ['#1cc88a', '#858796'],
                hoverBackgroundColor: ['#17a673', '#717384'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            cutoutPercentage: 80,
            legend: {
                display: true,
                position: 'bottom', // Legenda berada di bawah
                labels: {
                    usePointStyle: true, // Mengubah simbol kotak menjadi LINGKARAN
                    padding: 20
                }
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
        }
    });

    // Konfigurasi umum Bar Chart
    var commonOptions = {
        maintainAspectRatio: false,
        legend: { display: false },
        scales: {
            xAxes: [{ gridLines: { display: false, drawBorder: false } }],
            yAxes: [{
                ticks: { beginAtZero: true, maxTicksLimit: 5, padding: 10 },
                gridLines: { color: "rgb(234, 236, 244)", drawBorder: false, borderDash: [2] }
            }]
        }
    };

    // 1. Bar Chart KJPP
    var ctxKJPP = document.getElementById("kjppBarChart");
    new Chart(ctxKJPP, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labelsKJPP) !!},
            datasets: [{
                label: "Total Tugas",
                backgroundColor: "#e74a3b", // Warna Hijau agar beda dengan Cabang
                hoverBackgroundColor: "#be2617",
                data: {!! json_encode($valuesKJPP) !!},
            }],
        },
        options: commonOptions
    });

    // 2. Bar Chart Verifikator
    var ctxVerif = document.getElementById("verifBarChart");
    new Chart(ctxVerif, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labelsVerif) !!},
            datasets: [{
                label: "Tugas Terverifikasi",
                backgroundColor: "#f6c23e", // Warna Kuning/Orange
                data: {!! json_encode($valuesVerif) !!},
            }],
        },
        options: commonOptions
    });
</script>
@endpush