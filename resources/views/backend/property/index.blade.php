@extends('layouts.app',[
    'pageTitle' => 'Listado de viviendas'
])

@section('content')

    @livewire('property.table')
@endsection
