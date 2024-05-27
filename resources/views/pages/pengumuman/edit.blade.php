@extends('layouts.app')
@section('content')
    @if(session('success') || session('error'))
        <x-flash-message></x-flash-message>
    @endif
    <x-etc.nav-back head="{{$data['head']}}" href="/pengumuman"></x-etc.nav-back>
    <x-form.pengumuman-form :pengumuman="$pengumuman"
                            action="/pengumuman/{{$pengumuman->id_pengumuman}}"></x-form.pengumuman-form>
@endsection
