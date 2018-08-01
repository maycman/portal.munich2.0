@extends("layout")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-1">
            <button class="btn btn-danger" onclick="history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span> Volver</button>
        </div>
    </div>
    <div class="row separa">
        <div class="col-sm-5">
            <h1>Informe Telefónico de Servicio</h1>
        </div>
    </div>
    <div class="row separa">
        <div class="col-sm-offset-1 col-sm-3">
            <a href="/encuestas/reportes/xencusta" class="btn btn-primary btn-lg btn-block">Visualizar por Encuesta</a>
        </div>
        <div class="col-sm-3">
            <button id="rango" class="btn btn-primary btn-lg btn-block">Visualizar por rango</button>
        </div>
    </div>
    <div class="row separa">
        <div class="col-sm-offset-4">
            {{!! Form::open(array('url' => '/encuestas/reportes', 'method' => 'post') !!}}
            {{!! Form::close !!}}
        </div>
    </div>
</div>
@endsection