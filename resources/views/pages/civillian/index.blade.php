@extends('layouts.app')
@section('content')
    <x-etc.header-content head="{{$data['head']}}" desc="{{$data['desc']}}">
        <x-buttons.primary-button href="{{route('warga.create')}}">Tambah Data</x-buttons.primary-button>
    </x-etc.header-content>
@endsection
