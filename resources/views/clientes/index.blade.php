@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row container-fluid">
            <form class="form-caption caption-top" autocomplete="off" method="GET" action="{{route('clientes.index')}}">
                <div class="alert alert-info d-flex flex-row justify-content-between">
                    <h2>Sistema de búsquedas</h2>
                    <a href="{{url('/clientes')}}" class="btn btn-primary">Inicio</a>
                </div>
                @csrf
                @include('partials/search-form', ['mode' => "Buscar", 'label' => 'Ingresa'])
            </form>
        </div>
        <hr>
        <div class="alert alert-info d-flex flex-row justify-content-between">
            <h2>{{$title}}</h2>
            <a href="{{url('/clientes/create')}}" class="btn btn-success">Crear entrada</a>
        </div>
        @if(Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{Session::get('status')}}
        </div>
        @endif
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Razón Social</th>
                    <th scope="col">CUIT</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $singleCliente)
                    <tr>
                        <td scope="col">{{$singleCliente->id}}</td>
                        <td scope="col">{{$singleCliente->razon_social}}</td>
                        <td scope="col">{{$singleCliente->cuit}}</td>
                        <td scope="col" class="d-flex">
                                <a role="button" href="{{url('/clientes/' . $singleCliente->id)}}"><button class="btn btn-info btn-sm"><i class="fas fa-search-plus"></i></button></a>
                                <form method="POST" action="{{url('/clientes/' . $singleCliente->id)}}">
                                    @csrf
                                    {{ method_field('DELETE')}}
                                    <button type="submit" value="Borrar" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer borrar este registro?')" role="button"><i class="fas fa-trash"></i></button>
                                </form>
                        </td>
                @endforeach
                    </tr>
            </tbody>
        </table>
        {!! $clientes->links() !!}
    </div>
@endsection

