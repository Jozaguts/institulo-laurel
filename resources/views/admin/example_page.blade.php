@extends(backpack_view('blank'))
{{-- esta pagina puede servir para mostral alguna inforamcion o redirigir al usaario--}}
@section('content')
<div class="row">
    <div class="col-12">
        <div class="jumbotron">
            <h1 class="display-4">Mensaje informativo!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-12">
            <span class="alert alert-info">No tienes permisos necesarios para realizar esta acción</span>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button class="btn btn-primary">Regresar</button>
        </div>
    </div>
@endsection
