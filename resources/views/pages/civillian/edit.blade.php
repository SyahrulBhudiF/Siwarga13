@extends('layouts.app')
@section('content')
    <x-etc.sub-menu head="{{$data['head']}}"></x-etc.sub-menu>
    <x-form.civilliant-form action="/warga/{{$warga->id_warga}}" :warga="$warga"></x-form.civilliant-form>
@endsection
@push('js')
    <script src="{{ asset('js/civilliant.js') }}"></script>
@endpush
