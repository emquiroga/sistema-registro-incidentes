@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="mb-3">
    <label for="razon_social"> {{$label}} Razón Social</label>
    <input class="form-control" type="text" id="razon_social" name="razon_social" value="{{ isset($cliente->razon_social) ? $cliente->razon_social : old('razon_social')}}">
</div>
<div class="mb-3">
    <label for="cuit"> {{$label}} CUIT</label>
    <input class="form-control" type="text" id="cuit" name="cuit" value="{{ isset($cliente->cuit) ? $cliente->cuit : old('cuit')}}">
</div>
<button class="btn btn-primary mt-3 mb-3">{{$mode}} Cliente</button>

