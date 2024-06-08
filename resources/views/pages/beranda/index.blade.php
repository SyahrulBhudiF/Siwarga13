@extends('layouts.app')
@section('content')
    <div class="flex flex-col gap-4 justify-center w-full pb-8">
        <p class="text-Neutral/100 font-medium xl:text-xl lg:text-sm">Rangkuman Data Warga RW 13</p>
        <div class="grid lg:grid-cols-3 bg-[#F5F7F9] rounded-xl gap-1 p-1">
            <x-card.card-beranda id="count1" asset="{{asset('svg/profile.svg')}}"
                                 title="Total jumlah warga">{{$data['jumlah_warga']}} Orang
            </x-card.card-beranda>
            <x-card.card-beranda id="count2" asset="{{asset('svg/card.svg')}}"
                                 title="Total jumlah KK">{{$data['jumlah_kk']}} KK
            </x-card.card-beranda>
            <x-card.card-beranda id="count3" asset="{{asset('svg/tas.svg')}}"
                                 title="Total warga pekerja">{{$data['totalPekerja']}} Orang
            </x-card.card-beranda>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 bg-[#F5F7F9] rounded-xl gap-1 p-1">
            <div class="bg-white border border-Neutral/30 rounded-lg p-5">
                <canvas id="chartRt"></canvas>
            </div>
            <div class="bg-white border border-Neutral/30 rounded-lg p-5">
                <canvas id="chartGender"></canvas>
            </div>
        </div>
        <p class="text-Neutral/100 font-medium xl:text-xl lg:text-sm">Fitur tersedia</p>
        <div class="grid lg:grid-cols-3 gap-3">
            <x-card.card-nav asset="{{asset('svg/warga.svg')}}" title="Kelola data warga"
                             href="/warga">Halaman untuk mengelola data warga RW 13.
            </x-card.card-nav>
            <x-card.card-nav asset="{{asset('svg/bansos.svg')}}" title="Bansos"
                             href="/bansos">Halaman untuk mengelola peserta bansos warga RW 13.
            </x-card.card-nav>
            <x-card.card-nav asset="{{asset('svg/pengumuman.svg')}}" title="Pengumuman"
                             href="/pengumuman">Halaman untuk mengunggah pengumuman kepada warga RW 13.
            </x-card.card-nav>
            <x-card.card-nav asset="{{asset('svg/umkm.svg')}}" title="UMKM"
                             href="/umkm">Halaman untuk mengunggah konten promosi UMKM.
            </x-card.card-nav>
            <x-card.card-nav asset="{{asset('svg/dokumentasi.svg')}}" title="Kegiatan"
                             href="/dokumentasi">Halaman untuk mengelola dokumentasi kegiatan warga.
            </x-card.card-nav>
        </div>
    </div>
@endsection
@push('js')
    <script type="module">
        document.addEventListener('DOMContentLoaded', function () {
            animateValue('count1', 0, @json($data['jumlah_warga']), 1000, "Orang");
            animateValue('count2', 0, @json($data['jumlah_kk']), 1000, "KK");
            animateValue('count3', 0, @json($data['totalPekerja']), 1000, "Orang");

            const ctx = document.getElementById('chartRt');
            const ct = document.getElementById('chartGender');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['RT 001', 'RT 002', 'RT 003', 'RT 004', 'RT 005'],
                    datasets: [{
                        label: 'Grafik Jumlah Warga per-RT',
                        data: [@json($data['countRt']['rt1'] ?? 0), @json($data['countRt']['rt2'] ?? 0), @json($data['countRt']['rt3'] ?? 0), @json($data['countRt']['rt4'] ?? 0), @json($data['countRt']['rt5'] ?? 0)],
                        backgroundColor: 'rgba(2, 88, 100, 1)',
                        borderRadius: 5,
                        barPercentage: 0.5,
                        barThickness: 30,
                    }]
                },
                options: {
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                        },
                        y: {
                            grid: {
                                display: false
                            },
                            position: 'right',
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Grafik Jumlah Warga per-RT',
                            font: {
                                size: 16,
                            },
                            color: 'black',
                            align: 'start'
                        },
                        legend: {
                            display: false
                        }
                    }
                }
            });
            new Chart(ct, {
                type: 'bar',
                data: {
                    labels: [''],
                    datasets: [{
                        label: 'Laki-laki',
                        data: [@json($data['gender']['l'])], // Data untuk laki-laki
                        backgroundColor: 'rgba(0, 212, 126, 1)',
                        borderRadius: 15,
                        barPercentage: 0.5,
                        barThickness: 50,
                    }, {
                        label: 'Perempuan',
                        data: [@json($data['gender']['p'])], // Data untuk perempuan
                        backgroundColor: 'rgba(2, 100, 59, 1)',
                        borderRadius: 10,
                        barPercentage: 0.5,
                        barThickness: 50,
                    }]
                },
                options: {
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            stacked: true, // Batang dari setiap dataset akan ditumpuk
                        },
                        y: {
                            grid: {
                                display: false
                            },
                            display: false,
                            position: 'right',
                            stacked: true
                        }
                    },
                    indexAxis: 'y',
                    plugins: {
                        title: {
                            display: true,
                            text: 'Perbandingan Jenis Kelamin Warga RW 13',
                            font: {
                                size: 16,
                            },
                            color: 'black',
                            align: 'start'
                        },
                        legend: {
                            align: 'start',
                            position: 'bottom',
                            labels: {
                                font: {
                                    weight: 'bold',
                                    size: 14
                                },
                                generateLabels: function (chart) {
                                    const data = chart.data;
                                    return data.datasets.map((dataset, i) => {
                                        return {
                                            text: dataset.label + ": " + dataset.data.reduce((a, b) => a + b, 0),
                                            fillStyle: dataset.backgroundColor,
                                            hidden: isNaN(dataset.hidden) ? false : dataset.hidden,
                                            index: i
                                        };
                                    });
                                }
                            }
                        }
                    }
                }
            })
        })
    </script>
@endpush
