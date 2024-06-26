@extends('layouts.app')
@section('content')
    @if(session('success') || session('error'))
        <x-flash-message></x-flash-message>
    @endif
    <x-etc.sub-menu head="{{$data['head']}}"></x-etc.sub-menu>
    @php($warga = '')
    <x-form.civilliant-form action="/warga" :warga="$warga"></x-form.civilliant-form>
    <x-etc.loading></x-etc.loading>
@endsection
@push('js')
    <script src="{{ asset('js/civilliant.js') }}"></script>
    <script>
        document.querySelector('button[type="submit"]').addEventListener('click', function () {
            document.getElementById('loadingModal').style.display = 'block';
        });
    </script>
@endpush
