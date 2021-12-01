@extends('layouts.app')

@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <h3 class="navbar-brand">{{$title}}</h3>
                <a href="{{url('/clientes')}}" class="btn btn-success">Volver al inicio</a>
            </div>
        </nav>
        <div class="row container-fluid mt-3">
            <form action="{{route('clientes.store')}}" method="POST">
                @csrf
                @include('partials/search-form', ['mode' => "Crear", 'label' => 'Cargar'])
            </form>
        </div>
    </div>
@endsection
