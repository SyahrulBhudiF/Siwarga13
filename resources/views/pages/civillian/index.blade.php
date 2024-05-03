@extends('layouts.app')
@section('content')
    <x-etc.header-content head="{{$data['head']}}" desc="{{$data['desc']}}">
        <x-buttons.primary-button href="{{route('warga.create')}}">Tambah Data</x-buttons.primary-button>
    </x-etc.header-content>
    <div class="flex mt-5 justify-between">
        <div class="flex items-center gap-2">
            <x-buttons.filter-button id="RW">RW 13 (Semua RT)</x-buttons.filter-button>
            <svg xmlns="http://www.w3.org/2000/svg" width="2" height="24" viewBox="0 0 2 24" fill="none">
                <path d="M1 0V24" stroke="#E3E3E3"/>
            </svg>
            <x-buttons.filter-button id="RT1">RT 001</x-buttons.filter-button>
            <x-buttons.filter-button id="RT2">RT 002</x-buttons.filter-button>
            <x-buttons.filter-button id="RT3">RT 003</x-buttons.filter-button>
            <x-buttons.filter-button id="RT4">RT 004</x-buttons.filter-button>
            <x-buttons.filter-button id="RT5">RT 005</x-buttons.filter-button>
        </div>
        <div class="flex gap-3 items-center">
            <x-input.search-input name="search_nama" id="search_nama" placeholder="Cari nama"></x-input.search-input>
            <x-dropdown.dropdown-filter>Filter</x-dropdown.dropdown-filter>
        </div>
    </div>
@endsection
@push('js')
    <script>
        {{--Javascript function for add active style for filter button--}}
        document.getElementById('RW').classList.add('activeFilterButton');

        function active(e) {
            const buttons = document.querySelectorAll('button.filterButton');

            buttons.forEach(button => {
                button.classList.remove('activeFilterButton');
            });

            e.classList.add('activeFilterButton');
        }

        {{--Javascript function to add active style to filter button--}}
        function activeFilter(e) {
            e.classList.add('focusElement')
            e.querySelectorAll('path').forEach(path => {
                path.classList.remove('fill-[#025864]')
                path.classList.add('fill-Primary/10')
            })
        }

        {{--Javascript event to remove style when dropdown closed--}}
        const dropdown = document.querySelector('.dropdown');

        document.addEventListener('click', (event) => {
            if (!dropdown.contains(event.target)) {
                const button = dropdown.querySelector('button#filterInput');
                const paths = button.querySelectorAll('path');

                resetInput()

                button.classList.remove('focusElement');
                paths.forEach(path => path.classList.remove('fill-Primary/10'));
                paths.forEach(path => path.classList.add('fill-[#025864]'));
            }
        });

        {{--Javascript function to add active style for filter button--}}
        const inputFilterChange = () => {
            const count = document.getElementById('count')
            const button = document.querySelector('button[type="submit"]')
            button.classList.add('activeSubmitButton')
            button.classList.remove('pointer-events-none')
            count.classList.remove('hidden')
            count.innerText = document.querySelectorAll('input[type="radio"]:checked, input[type="checkbox"]:checked').length
        }

        {{--Javascript function to reset input--}}
        const resetInput = () => {
            const buttons = document.querySelectorAll('input[type="radio"], input[type="checkbox"]')

            const count = document.getElementById('count')
            count.classList.add('hidden')
            count.innerText = ''

            buttons.forEach(button => {
                button.checked = false
            })

            const button = document.querySelector('button[type="submit"]')
            button.classList.remove('activeSubmitButton')
            button.classList.add('pointer-events-none')
        }

    </script>
@endpush
