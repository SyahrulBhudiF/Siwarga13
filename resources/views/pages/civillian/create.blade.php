@extends('layouts.app')
@section('content')
    <x-etc.sub-menu head="{{$data['head']}}"></x-etc.sub-menu>
    @php($warga = '')
    <x-form.civilliant-form action="/warga" :warga="$warga"></x-form.civilliant-form>
@endsection
@push('js')
    <script>
        let toggleCount = {};

        // When an option is selected, the value of the input is set to the selected option and the dropdown is hidden
        function selectOption(e, id) {
            let input = document.getElementById(id);
            input.value = e.textContent.trim();
            let dropdownContent = e.closest('#content-' + id);
            let drop = document.getElementById('drop');
            drop.classList.toggle('rotate-180');
            if (dropdownContent) {
                dropdownContent.classList.toggle('hidden');
            }
            // Set toggleCount to 0 when an option is selected
            toggleCount[id] = 0;
        }

        // When dropdown click is triggered hidden class is toggled
        function toggleDropdown(id) {
            if (!toggleCount[id]) {
                toggleCount[id] = 0;
            }
            let dropdownContent = document.getElementById(id);
            let drop = document.getElementById('drop');
            drop.classList.toggle('rotate-180');
            if (dropdownContent && toggleCount[id] % 2 === 1) {
                dropdownContent.classList.toggle('hidden');
            }
            toggleCount[id]++;
        }

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const inputs = Array.from(form.querySelectorAll('input, select'));
            const submitButton = form.querySelector('button[type="submit"]');

            function checkInputs() {
                const allFilled = inputs.every(input => input.value.trim() !== '');
                submitButton.disabled = !allFilled;

                if (allFilled) {
                    submitButton.classList.remove('cursor-not-allowed', 'pointer-events-none');
                } else {
                    submitButton.classList.add('cursor-not-allowed', 'pointer-events-none');
                }
            }

            inputs.forEach(input => {
                input.addEventListener('input', checkInputs);
            });

            // Cek input saat halaman dimuat
            checkInputs();
        });
    </script>
@endpush
