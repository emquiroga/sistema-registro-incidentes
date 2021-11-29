<div class="container-fluid">
    <div class="form-group">
        <label for="razon_social"> Razón Social
            <input class="form-control" type="text" id="razón_social" name="razon_social" value="{{isset($cliente) ? $cliente->razon_social : ''}}">
        </label>
    </div>
    <div class="form-group">
        <label for="cuit"> CUIT
            <input class="form-control" type="text" id="cuit" name="cuit" value="{{isset($cliente) ? $cliente->cuit : ''}}">
        </label>
    </div>
    <button class="btn btn-info mt-3">Cargar</button>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
         @foreach($errors->all() as $error)
             <li>{{$error}}</li>
         @endforeach
        </ul>
    </div>
    @endif
</div>

