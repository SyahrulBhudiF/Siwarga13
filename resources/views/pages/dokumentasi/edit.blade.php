@extends('layouts.app')
@section('content')
    @if(session('success') || session('error'))
        <x-flash-message></x-flash-message>
    @endif
    <x-etc.nav-back head="{{$data['head']}}" href="/dokumentasi"></x-etc.nav-back>
    {{--    @dd($dokumentasi)--}}
    <x-form.dokumentasi-form :dokumentasi="$dokumentasi"
                             action="/dokumentasi/{{$dokumentasi->id_dokumentasi}}"></x-form.dokumentasi-form>
@endsection
