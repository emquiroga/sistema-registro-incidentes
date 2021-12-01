@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
        <div class="container-fluid mt-3">
            @if(Session::has('status'))
            <div class="alert alert-warning" role="alert">
                {{Session::get('status')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <strong>Cliente</strong>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>ID:</strong> {{$cliente->id}}</li>
                  <li class="list-group-item"><strong>Razón social:</strong> {{$cliente->razon_social}}</li>
                  <li class="list-group-item"><strong>CUIT:</strong> {{$cliente->cuit}}</li>
                </ul>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-end mt-3">
            <a href="{{url('/clientes/' . $cliente->id . '/edit')}}"><button class="btn btn-warning mx-3">Editar</button></a>
            <a href="{{url('/clientes')}}" class="btn btn-success mx-3">Volver</a>
        </div>
    </div>
@endsection
