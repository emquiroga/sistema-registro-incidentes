<!DOCTYPE html>
<html lang="es">
@include ('partials/head')
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <h3 class="navbar-brand">{{$title}}</h3>
            <a href="{{url('/clientes')}}" class="btn btn-success">Volver al inicio</a>
        </div>
    </nav>
    @if(Session::has('status'))
    <div class="alert alert-warning" role="alert">
        {{Session::get('status')}}
    </div>
    @endif
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            <strong>Cliente</strong>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>ID:</strong> {{$cliente->id}}</li>
          <li class="list-group-item"><strong>Razón social:</strong> {{$cliente->razon_social}}</li>
          <li class="list-group-item"><strong>CUIT:</strong> {{$cliente->cuit}}</li>
        </ul>
        <a href="{{url('/clientes/' . $cliente->id . "/edit")}}"><button class="btn btn-warning w-100">Editar</button></a>
    </div>
</body>
</html>
