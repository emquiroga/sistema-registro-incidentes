<!DOCTYPE html>
<html lang="en">
@include ('partials.head')
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <h3 class="navbar-brand">{{$title}}</h3>
            <a href="{{url('/clientes/' . $cliente->id)}}" class="btn btn-success">Volver</a>
        </div>
    </nav>
    <form action="{{url('/clientes/' . $cliente->id )}}" method="POST">
        @csrf
        {{method_field('PATCH')}}
        @include('clientes/form')
    </form>
</body>
</html>
