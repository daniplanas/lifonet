@extends('layouts.app',[
    'pageTitle' => 'Listado de contenedores'
])

@section('content')

    @livewire('container.table')
@endsection
