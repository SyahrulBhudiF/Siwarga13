<!doctype html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="description" content="Landing Page Web Warga RW13">
    <link rel="icon" href="{{ asset('svg/Logo.svg') }}">
    <link rel="preload" as="image" href="{{ asset('img/hero.webp') }}">
    <title>Siwarga13</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .textMain {
            @apply text-xl text-Neutral/90 2xl:w-[80%] xl:w-[85%]
        }
    </style>
</head>

<body class="w-screen lg:h-screen overflow-x-hidden max-lg:flex max-lg:flex-col">
    @include('dashboard.layouts.navbar')
    <section class="mt-3 w-full h-full fade-in">
        <div
            class="flex gap-8 max-lg:flex-col rounded-[1.25rem] h-[85vh] max-lg:h-fit bg-[#F5F5F3] px-12 py-6 max-lg:p-4 m-3">
            <div class="flex flex-col justify-center gap-8">
                <div class="flex flex-col gap-4 items-stretch">
                    <p class="p-3 bg-white rounded-3xl w-fit">👋🏻 Halo, Warga RW 13!</p>
                    <p
                        class="font-medium text-Neutral/100 2xl:text-[3.75rem] xl:text-[3rem] lg:text-[2.75rem] max-lg:text-[2rem] max-sm:text-[1.75rem] text-nowrap w-full 2xl:w-[75%]">
                        Selamat
                        Datang di <span class="text-nowrap"><br>Portal
                            <span id="typeWritter"></span></span></p>
                    <p class="textMain">Dapatkan informasi terbaru dan akurat
                        tentang
                        warga, bantuan
                        sosial,
                        dan berbagai layanan komunitas langsung dari satu platform.</p>
                    <a href="#chartSect"
                        class="max-lg:self-start py-3 px-6 bg-Primary/10 rounded-[6.25rem] text-white text-sm font-semibold w-fit buttonAnimation">Jelajahi</a>
                </div>
                <div class="lg:grid lg:grid-rows-1 lg:grid-cols-2 max-lg:flex max-lg:flex-col gap-4">
                    <div class="flex flex-col justify-between px-5 py-6 2xl:gap-8 gap-4 bg-white rounded-2xl">
                        <div class="flex items-center gap-3">
                            <div class="p-2 border border-neutral/30 rounded-xl shadow w-fit">
                                <img src="{{ asset('svg/profile.svg') }}" alt="icon" class="w-fit">
                            </div>
                            <p class="font-medium text-Neutral/100 text-xl">Total Warga</p>
                        </div>
                        <p id="warga" class="font-medium text-Neutral/100 text-[2rem]">{{ $data['totalWarga'] }}
                            Orang</p>
                    </div>
                    <div class="flex flex-col justify-between px-5 py-6 2xl:gap-8 gap-4 bg-white rounded-2xl">
                        <div class="flex items-center gap-3">
                            <div class="p-2 border border-neutral/30 rounded-xl shadow w-fit">
                                <img src="{{ asset('svg/card.svg') }}" alt="icon" class="w-fit">
                            </div>
                            <p class="font-medium text-Neutral/100 text-xl">Total KK</p>
                        </div>
                        <p id="kk" class="font-medium text-Neutral/100 text-[2rem] mt-auto">
                            {{ $data['totalKK'] }} KK</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-end lg:overflow-hidden 2xl:w-[60%] w-full h-full max-lg:h-[65vh] relative">
                <img src="{{ asset('img/hero.webp') }}" alt="hero"
                    class="rounded-2xl w-full h-full max-lg:object-cover max-lg:self-stretch">
                <div class="absolute bottom-1 w-full">
                    <div class="bg-white p-5 rounded-2xl m-3">
                        <p class="text-Neutral/100 font-medium text-2xl">Tentang RW 13</p>
                        <p class="text-Neutral/90 font-medium">RW 13 adalah Rukun Warga yang terletak di Desa
                            Sumberporong,
                            Kecamatan Lawang, Kabupaten Malang.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Chart --}}
    <section id="chartSect" class="flex flex-col lg:grid lg:grid-cols-2 gap-[3.75rem] m-[3.75rem]">
        <div class="flex flex-col gap-5" data-aos="fade-right">
            <div>
                <p class="text-Neutral/100 font-medium text-[2.5rem]">Visualisasi Data Warga RW 13</p>
                <p class="text-xl text-Neutral/90">Dapatkan informasi visual mengenai beberapa kategori dalam data
                    warga
                    RW
                    13
                    dibawah ini.</p>
            </div>
            <div class="flex flex-col gap-3">
                <div onclick="changeChart(this, 'containRt')"
                    class="flex items-center gap-3 p-6 rounded-xl border border-Neutral/40 cursor-pointer buttonAnimation containerChart activeChart">
                    <svg class="svgAr" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none">
                        <path d="M17.25 8.25L21 12M21 12L17.25 15.75M21 12H3" stroke="#025864" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="text-xl font-medium">Grafik Jumlah Warga per-RT</p>
                </div>
                <div onclick="changeChart(this, 'containGender')"
                    class="flex items-center gap-3 p-6 rounded-xl border border-Neutral/40 cursor-pointer buttonAnimation containerChart">
                    <svg class="hidden svgAr" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none">
                        <path d="M17.25 8.25L21 12M21 12L17.25 15.75M21 12H3" stroke="#025864" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="text-xl font-medium">Perbandingan Jenis Kelamin</p>
                </div>
                <div onclick="changeChart(this, 'containMarriage')"
                    class="flex items-center gap-3 p-6 rounded-xl border border-Neutral/40 cursor-pointer buttonAnimation containerChart">
                    <svg class="hidden svgAr" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none">
                        <path d="M17.25 8.25L21 12M21 12L17.25 15.75M21 12H3" stroke="#025864" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="text-xl font-medium">Perbandingan Status Pernikahan</p>
                </div>
            </div>
        </div>
        <div data-aos="fade-left" id="containRt"
            class="bg-white fade-in svgAr border border-Neutral/30 rounded-lg p-5 flex justify-center lg:h-[60vh]">
            <canvas id="chartRt"></canvas>
        </div>
        <div data-aos="fade-left" id="containGender"
            class="bg-white svgAr w-full border fade-in hidden border-Neutral/30 rounded-lg p-5 flex justify-center max-lg:h-[40vh]">
            <canvas id="chartGender"></canvas>
        </div>
        <div data-aos="fade-left" id="containMarriage"
            class="bg-white svgAr w-full border fade-in hidden border-Neutral/30 rounded-lg p-5 flex justify-center lg:h-[60vh] max-lg:h-[40vh] max-lg:items-center">
            <canvas id="chartNikah"></canvas>
        </div>
    </section>

    {{-- Pengumuman --}}
    <section data-aos="fade-down" class="flex flex-col gap-8 mt-[8rem] m-3">
        <x-etc.title-content title="Pengumuman"
            desc="Berisi list pengumuman yang berfungsi untuk memberi informasi kepada warga RW 13."></x-etc.title-content>
        <div class="flex flex-col gap-6 bg-[#F5F5F3] rounded-2xl p-12">
            <p class="text-Neutral/100 font-medium text-[2rem]">Pengumuman Terbaru</p>
            <div class="grid lg:grid-cols-3 gap-5">
                @foreach ($data['pengumuman'] as $pengumuman)
                    <x-card.pengumuman-card :pengumuman="$pengumuman"></x-card.pengumuman-card>
                @endforeach
            </div>
            <a href="/dashboard/pengumuman"
                class="self-center py-3 px-6 bg-Primary/10 rounded-[6.25rem] text-white text-sm font-semibold w-fit buttonAnimation">Lihat
                Selengkapnya</a>
        </div>
    </section>
    {{-- Kegiatan --}}
    <section data-aos="fade" class="flex flex-col gap-8 mt-[8rem] mx-[3.75rem]">
        <div class="flex justify-between max-lg:flex-col max-lg:gap-5 max-lg:items-start items-center">
            <div class="flex flex-col gap-3">
                <p class="text-[2.5rem] font-medium text-Neutral/100">Kegiatan Warga</p>
                <p class="text-Neutral/90 text-xl">Berisi daftar informasi kegiatan warga RW 13.</p>
            </div>
            <a href="/dashboard/dokumentasi"
                class="self-center max-lg:self-start py-3 px-6 bg-Primary/10 rounded-[6.25rem] text-white text-sm font-semibold w-fit buttonAnimation">Lihat
                Selengkapnya</a>
        </div>
        <div class="grid lg:grid-cols-2 gap-5">
            @foreach ($data['dokumentasi']->take(2) as $dokumentasi)
                <x-card.dokumentasi-card :dokumentasi="$dokumentasi"></x-card.dokumentasi-card>
            @endforeach
        </div>
        <div class="grid lg:grid-cols-3 gap-5 -mt-2">
            @foreach ($data['dokumentasi']->slice(2) as $dokumentasi)
                <x-card.dokumentasi-card :dokumentasi="$dokumentasi"></x-card.dokumentasi-card>
            @endforeach
        </div>
    </section>
    {{-- Umkm --}}
    <section data-aos="fade-down" class="flex flex-col gap-8 mt-[8rem] mx-[3.75rem]">
        <x-etc.title-content title="UMKM" desc="Berisi daftar informasi UMKM warga RW 13."></x-etc.title-content>
        <div class="grid lg:grid-cols-3 gap-5">
            @foreach ($data['umkm'] as $umkm)
                <x-card.umkm-card :umkm="$umkm"></x-card.umkm-card>
            @endforeach
        </div>
        <a href="/dashboard/umkm"
            class="self-center py-3 px-6 bg-Primary/10 rounded-[6.25rem] text-white text-sm font-semibold w-fit buttonAnimation">Lihat
            Selengkapnya</a>
    </section>
    {{-- Footer --}}
    @include('dashboard.layouts.footer')
</body>
<script defer>
    function changeChart(element, container) {
        document.querySelectorAll('.containerChart').forEach((div) => {
            div.classList.remove('activeChart');
        });

        element.classList.add('activeChart');

        const svgs = document.querySelectorAll('.svgAr');

        svgs.forEach((svg) => {
            svg.classList.add('hidden');
        });

        element.querySelector('.svgAr').classList.remove('hidden');
        document.getElementById(container).classList.remove('hidden');
    }
</script>
<script type="module">
    document.addEventListener('DOMContentLoaded', function() {
        animateValue('warga', 0, @json($data['totalWarga']), 1000, "Orang");
        animateValue('kk', 0, @json($data['totalKK']), 1000, "KK");

        let app = document.getElementById('typeWritter');

        let typewriter = new Typewriter(app, {
            loop: true,
            delay: 75,
        });

        typewriter
            .pauseFor(1000)
            .typeString('Informasi RW 13')
            .pauseFor(300)
            .deleteChars(5)
            .typeString('<span class="text-Primary/10 underline">RW 13<span>')
            .pauseFor(1000)
            .start();

        const canvasElements = document.querySelectorAll('canvas');

        canvasElements.forEach((canvas) => {
            const parentDiv = canvas.parentElement;
            canvas.width = parentDiv.offsetWidth;
            canvas.height = parentDiv.offsetHeight;
        });


        const anchor = document.querySelector('a[href="#chartSect"]');
        const chart = document.querySelector('#chartSect');

        anchor.addEventListener('click', (event) => {
            event.preventDefault();
            chart.scrollIntoView({
                behavior: 'smooth'
            });
        });

        const ctx = document.getElementById('chartRt');
        const ct = document.getElementById('chartGender');
        const chartNikah = document.getElementById('chartNikah');

        new Chart(chartNikah, {
            type: 'doughnut',
            data: {
                labels: ['Menikah', 'Belum Menikah', 'Cerai Hidup', 'Cerai Mati'],
                datasets: [{
                    data: [@json($data['statusNikah']['Kawin']), @json($data['statusNikah']['Belum Kawin']),
                        @json($data['statusNikah']['Cerai Hidup']), @json($data['statusNikah']['Cerai Mati'])
                    ],
                    backgroundColor: ['rgba(0, 212, 126, 1)', 'rgba(2, 100, 59, 1)',
                        'rgba(34, 139, 34, 1)', 'rgba(60, 179, 113, 1)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Perbandingan Status Pernikahan Warga RW 13',
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
                            generateLabels: function(chart) {
                                const data = chart.data;
                                return data.datasets[0].data.map((value, i) => {
                                    return {
                                        text: data.labels[i] + ": " + value,
                                        fillStyle: data.datasets[0].backgroundColor[i],
                                        hidden: isNaN(data.datasets[0].hidden) ? false :
                                            data.datasets[0].hidden,
                                        index: i
                                    };
                                });
                            }
                        }
                    }
                }
            }
        });

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['RT 001', 'RT 002', 'RT 003', 'RT 004', 'RT 005'],
                datasets: [{
                    label: 'Grafik Jumlah Warga per-RT',
                    data: [@json($data['countRt']['RT 1'] ?? 0), @json($data['countRt']['RT 2'] ?? 0),
                        @json($data['countRt']['RT 3'] ?? 0), @json($data['countRt']['RT 4'] ?? 0),
                        @json($data['countRt']['RT 5'] ?? 0)
                    ],
                    backgroundColor: 'rgba(2, 88, 100, 1)',
                    borderRadius: 5,
                    barPercentage: 0.5,
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
                    data: [@json($data['gender']['Laki-laki'])], // Data untuk laki-laki
                    backgroundColor: 'rgba(0, 212, 126, 1)',
                    borderRadius: 15,
                    barPercentage: 0.5,
                    // barThickness: 60
                }, {
                    label: 'Perempuan',
                    data: [@json($data['gender']['Perempuan'])], // Data untuk perempuan
                    backgroundColor: 'rgba(2, 100, 59, 1)',
                    borderRadius: 10,
                    barPercentage: 0.5,
                    // barThickness: 60,
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
                            generateLabels: function(chart) {
                                const data = chart.data;
                                return data.datasets.map((dataset, i) => {
                                    return {
                                        text: dataset.label + ": " + dataset.data.reduce((a,
                                            b) => a + b, 0),
                                        fillStyle: dataset.backgroundColor,
                                        hidden: isNaN(dataset.hidden) ? false : dataset
                                            .hidden,
                                        index: i
                                    };
                                });
                            }
                        }
                    }
                }
            }
        })
    });
</script>

</html>
