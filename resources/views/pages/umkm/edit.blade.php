@extends('layouts.app')
@section('content')
    @if(session('success') || session('error'))
        <x-flash-message></x-flash-message>
    @endif
    <x-etc.nav-back head="{{$data['head']}}" href="/umkm"></x-etc.nav-back>
    <x-form.umkm-form :umkm="$umkm"
                      action="/umkm/{{$umkm->id_umkm}}"></x-form.umkm-form>
@endsection
@push('js')
<script>
    let toggleCount = {};

    // When an option is selected, the value of the input is set to the selected option and the dropdown is hidden
    function selectOption(e, id) {
        const input = document.getElementById(id);
        input.value = e.textContent.trim();
        const dropdownContent = e.closest('#content-' + id);
        const drop = document.getElementById('drop');
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
        const dropdownContent = document.getElementById(id);
        const drop = document.getElementById('drop');
        drop.classList.toggle('rotate-180');
        if (dropdownContent && toggleCount[id] !== 0) {
            dropdownContent.classList.toggle('hidden');
        }
        toggleCount[id]++;
    }
</script>
@endpush
