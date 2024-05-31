@extends('layouts.app')
@section('content')
    @if(session('success') || session('error'))
        <x-flash-message></x-flash-message>
    @endif
    <x-etc.nav-back head="{{$data['head']}}" href="/umkm"></x-etc.nav-back>
    <x-form.umkm-form :umkm="$umkm"
                      action="/umkm/{{$umkm->id_umkm}}"></x-form.umkm-form>
@endsection
