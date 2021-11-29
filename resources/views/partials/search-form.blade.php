<div class="container-fluid">
    <form class="ml-3" autocomplete="off" method="GET" action="{{route('clientes.index')}}">
        <div class="form-group">
            <label for="razon_social"> Ingresa la razón social
                <input class="form-control" type="text" id="razon_social" name="razon_social">
            </label>
        </div>
        <div class="form-group">
            <label for="cuit"> Ingresa el CUIT
                <input class="form-control" type="text" id="cuit" name="cuit">
            </label>
        </div>
        <button class="btn btn-primary mt-3 mb-3">Buscar</button>
    </form>
</div>
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
