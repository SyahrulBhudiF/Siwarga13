@extends('layouts.app')
@section('content')
    <x-etc.sub-menu head="{{$data['head']}}"></x-etc.sub-menu>
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
            const inputs = document.querySelectorAll('input, select');
            const submitButton = document.querySelector('button[type="submit"]');

            function checkInputs() {
                let allFilled = true;

                inputs.forEach(input => {
                    if (input.type !== 'radio' && !input.value.trim()) {
                        allFilled = false;
                    } else if (input.type === 'radio' && !document.querySelector(`input[name="${input.name}"]:checked`)) {
                        allFilled = false;
                    }
                });

                if (allFilled) {
                    submitButton.removeAttribute('disabled');
                    submitButton.classList.remove('bg-Neutral/30', 'pointer-events-none');
                } else {
                    submitButton.setAttribute('disabled', 'disabled');
                    submitButton.classList.add('bg-Neutral/30', 'pointer-events-none');
                }
            }

            inputs.forEach(input => {
                input.addEventListener('input', checkInputs);
            });

            // Check inputs initially
            checkInputs();
        });
    </script>
@endpush
