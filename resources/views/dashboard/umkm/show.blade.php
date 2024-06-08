@extends('dashboard.layouts.template')
@section('content')
    <svg onclick="window.location.href='/dashboard/umkm'"
        class="lg:hidden cursor-pointer buttonAnimation ml-4 mt-[3.75rem]" xmlns="http://www.w3.org/2000/svg" width="20"
        height="10" viewBox="0 0 20 10" fill="none">
        <path d="M4.75 8.75L1 5M1 5L4.75 1.25M1 5H19" stroke="black" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
    </svg>
    <div class="flex w-full p-[3.75rem] max-lg:p-4">
        <p class="text-Primary/10 font-medium text-xl">UMKM</p>
    </div>
    <div class="lg:grid lg:grid-cols-2 lg:gap-[3.75rem] max-lg:gap-4 w-full px-[3.75rem] max-lg:px-4 pb-[3.75rem]">
        <x-etc.slider :dt="$data['umkm']->file"></x-etc.slider>
        <div class="flex flex-col gap-5 w-full">
            <p class="text-Neutral/100 text-2xl font-medium">{{ $data['umkm']->judul }}</p>
            <div class="lg:grid lg:grid-cols-2 max-lg:flex max-lg:flex-col max-lg:items-stretch items-center gap-3 border-b border-b-Neutral/30 pb-[1.25rem] mb-[1.25rem]">
                <div class="flex items-center gap-2 p-3 bg-white border border-Neutral/30 rounded-[1.25rem]">
                    <div class="p-3 rounded-full border border-Neutral/30">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M20.6191 8.45C19.5691 3.83 15.5391 1.75 11.9991 1.75C11.9991 1.75 11.9991 1.75 11.9891 1.75C8.45912 1.75 4.41912 3.82 3.36912 8.44C2.19912 13.6 5.35912 17.97 8.21912 20.72C9.27912 21.74 10.6391 22.25 11.9991 22.25C13.3591 22.25 14.7191 21.74 15.7691 20.72C18.6291 17.97 21.7891 13.61 20.6191 8.45ZM11.9991 13.46C10.2591 13.46 8.84912 12.05 8.84912 10.31C8.84912 8.57 10.2591 7.16 11.9991 7.16C13.7391 7.16 15.1491 8.57 15.1491 10.31C15.1491 12.05 13.7391 13.46 11.9991 13.46Z"
                                fill="#025864" />
                        </svg>
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="text-Neutral/80 text-sm font-medium">Alamat</p>
                        <p class="text-Neutral/100 font-medium">{{ $data['umkm']->alamat }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 p-3 bg-white border border-Neutral/30 rounded-[1.25rem]">
                    <div class="p-3 rounded-full border border-Neutral/30">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M19.8305 8.70005L15.3005 4.17005C14.3505 3.22005 13.0405 2.71005 11.7005 2.78005L6.70046 3.02005C4.70046 3.11005 3.11046 4.70005 3.01046 6.69005L2.77046 11.69C2.71046 13.03 3.21046 14.34 4.16046 15.29L8.69046 19.82C10.5505 21.68 13.5705 21.68 15.4405 19.82L19.8305 15.43C21.7005 13.58 21.7005 10.56 19.8305 8.70005ZM9.50046 12.38C7.91046 12.38 6.62046 11.09 6.62046 9.50005C6.62046 7.91005 7.91046 6.62005 9.50046 6.62005C11.0905 6.62005 12.3805 7.91005 12.3805 9.50005C12.3805 11.09 11.0905 12.38 9.50046 12.38Z"
                                fill="#025864" />
                        </svg>
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="text-Neutral/80 text-sm font-medium">Kisaran Harga</p>
                        <p class="text-Neutral/100 font-medium">{{ $data['umkm']->harga }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 p-3 bg-white border border-Neutral/30 rounded-[1.25rem]">
                    <div class="p-3 rounded-full border border-Neutral/30">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M19.3297 5.68003L13.0597 2.30003C12.3997 1.94003 11.5997 1.94003 10.9397 2.30003L4.66969 5.68003C4.20969 5.93003 3.92969 6.41003 3.92969 6.96003C3.92969 7.50003 4.20969 7.99003 4.66969 8.24003L10.9397 11.62C11.2697 11.8 11.6397 11.89 11.9997 11.89C12.3597 11.89 12.7297 11.8 13.0597 11.62L19.3297 8.24003C19.7897 7.99003 20.0697 7.51003 20.0697 6.96003C20.0697 6.41003 19.7897 5.93003 19.3297 5.68003Z"
                                fill="#025864" />
                            <path
                                d="M9.91 12.79L4.07 9.87C3.62 9.65 3.1 9.67 2.68 9.93C2.25 10.2 2 10.65 2 11.15V16.66C2 17.61 2.53 18.47 3.38 18.9L9.21 21.82C9.41 21.92 9.63 21.97 9.85 21.97C10.11 21.97 10.37 21.9 10.6 21.76C11.03 21.5 11.28 21.04 11.28 20.54V15.03C11.29 14.07 10.76 13.21 9.91 12.79Z"
                                fill="#025864" />
                            <path
                                d="M21.3207 9.9299C20.8907 9.6699 20.3707 9.6399 19.9307 9.8699L14.1007 12.7899C13.2507 13.2199 12.7207 14.0699 12.7207 15.0299V20.5399C12.7207 21.0399 12.9707 21.4999 13.4007 21.7599C13.6307 21.8999 13.8907 21.9699 14.1507 21.9699C14.3707 21.9699 14.5907 21.9199 14.7907 21.8199L20.6207 18.8999C21.4707 18.4699 22.0007 17.6199 22.0007 16.6599V11.1499C22.0007 10.6499 21.7507 10.1999 21.3207 9.9299Z"
                                fill="#025864" />
                        </svg>
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="text-Neutral/80 text-sm font-medium">Kategori</p>
                        <p class="text-Neutral/100 font-medium">{{ $data['umkm']->kategori }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 p-3 bg-white border border-Neutral/30 rounded-[1.25rem]">
                    <div class="p-3 rounded-full border border-Neutral/30">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M19.3297 5.68003L13.0597 2.30003C12.3997 1.94003 11.5997 1.94003 10.9397 2.30003L4.66969 5.68003C4.20969 5.93003 3.92969 6.41003 3.92969 6.96003C3.92969 7.50003 4.20969 7.99003 4.66969 8.24003L10.9397 11.62C11.2697 11.8 11.6397 11.89 11.9997 11.89C12.3597 11.89 12.7297 11.8 13.0597 11.62L19.3297 8.24003C19.7897 7.99003 20.0697 7.51003 20.0697 6.96003C20.0697 6.41003 19.7897 5.93003 19.3297 5.68003Z"
                                fill="#025864" />
                            <path
                                d="M9.91 12.79L4.07 9.87C3.62 9.65 3.1 9.67 2.68 9.93C2.25 10.2 2 10.65 2 11.15V16.66C2 17.61 2.53 18.47 3.38 18.9L9.21 21.82C9.41 21.92 9.63 21.97 9.85 21.97C10.11 21.97 10.37 21.9 10.6 21.76C11.03 21.5 11.28 21.04 11.28 20.54V15.03C11.29 14.07 10.76 13.21 9.91 12.79Z"
                                fill="#025864" />
                            <path
                                d="M21.3207 9.9299C20.8907 9.6699 20.3707 9.6399 19.9307 9.8699L14.1007 12.7899C13.2507 13.2199 12.7207 14.0699 12.7207 15.0299V20.5399C12.7207 21.0399 12.9707 21.4999 13.4007 21.7599C13.6307 21.8999 13.8907 21.9699 14.1507 21.9699C14.3707 21.9699 14.5907 21.9199 14.7907 21.8199L20.6207 18.8999C21.4707 18.4699 22.0007 17.6199 22.0007 16.6599V11.1499C22.0007 10.6499 21.7507 10.1999 21.3207 9.9299Z"
                                fill="#025864" />
                        </svg>
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="text-Neutral/80 text-sm font-medium">Kontak Penjual</p>
                        <p class="text-Neutral/100 font-medium">{{ $data['umkm']->no_telp }}</p>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <p class="text-Neutral/100 font-normal text-lg">{!! Str::markdown($data['umkm']->content) !!}</p>
            </div>
        </div>
    </div>
@endsection
