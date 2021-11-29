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
    <form action="{{route('clientes.store')}}" method="POST">
        @csrf
        @include('clientes/form')
    </form>
</body>
</html>
