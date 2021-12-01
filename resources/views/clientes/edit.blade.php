@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-info d-flex flex-row justify-content-between">
            <h3>{{$title}}</h3>
            <a href="{{url('/clientes/' . $cliente->id)}}" class="btn btn-success">Volver</a>
        </div>
        <div class="row container-fluid">
            <form action="{{url('/clientes/' . $cliente->id )}}" method="POST">
                @csrf
                {{method_field('PATCH')}}
                @include('partials/search-form', ['mode' => "Editar", 'label' => 'Modifica'])
            </form>
        </div>
    </div>
@endsection
