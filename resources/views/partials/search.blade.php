<div class="alert alert-info d-flex flex-row justify-content-between">
    <h3>Sistema de búsquedas</h3>
    <div class="d-flex flex-row justify-content-between">
        <a href="{{url('/clientes')}}" class="btn btm-outline btn-info">Inicio</a>
        <a class="btn btm-outline btn-info" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Buscar</a>
    </div>
</div>
<div class="row">
<div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
    <form class="form-caption caption-top" autocomplete="off" method="GET" action="{{url('clientes')}}">
        @csrf
        @include('partials/search-form', ['mode' => "Buscar", 'label' => 'Ingresa'])
       </form>
    </div>
</div>
</div>
