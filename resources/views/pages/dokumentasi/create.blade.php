@extends('layouts.app')
@section('content')
    @if(session('success') || session('error'))
        <x-flash-message></x-flash-message>
    @endif
    <x-etc.nav-back head="{{$data['head']}}" href="/dokumentasi"></x-etc.nav-back>
    @php
        $dokumentasi = '';
    @endphp
    <x-form.dokumentasi-form :dokumentasi="$dokumentasi" action="/dokumentasi"></x-form.dokumentasi-form>
@endsection
