<!DOCTYPE html>
<html lang="es">
@include ('partials/head')
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <h3 class="navbar-brand">{{$title}}</h3>
            <div class="ml-3">
                <a href="{{url('/clientes')}}" class="btn btn-primary">Inicio</a>
                <a href="{{url('/clientes/create')}}" class="btn btn-success">Crear entrada</a>
            </div>
        </div>
    </nav>
    @include('partials/search-form')
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
                    <td>{{$singleCliente->id}}</td>
                    <td>{{$singleCliente->razon_social}}</td>
                    <td>{{$singleCliente->cuit}}</td>
                    <td> <a class="btn btn-info" role="button" href="{{url('/clientes/' . $singleCliente->id)}}">Ver</a>
                        <form method="POST" action="{{url('/clientes/' . $singleCliente->id)}}">
                            @csrf
                            {{ method_field('DELETE')}}
                            <button type="submit" value="Borrar" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer borrar este registro?')" role="button">Borrar</button>
                        </form>
                    </td>
            @endforeach
                </tr>
        </tbody>
    </table>
</body>
</html>
