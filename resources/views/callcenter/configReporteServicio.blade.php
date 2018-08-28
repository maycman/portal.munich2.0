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
            <button id="butonRango" class="btn btn-primary btn-lg btn-block">Visualizar por rango</button>
        </div>
    </div>
    <div id="rango" class="row separa hide">
        <div class="col-sm-offset-2 buffer-top col-sm-10">
            {!! Form::open(array('url' => '/encuestas/reporte', 'method' => 'post', 'class' => 'form-inline')) !!}
                <div class="form-group">
                    {!! Form::label('fechaInicial', 'Fecha Inicial') !!}
                    <div class='input-group date age'>
                        <input id="fechaInit" name="fechaInit" type='text' class="form-control" required/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('fechaFinal', 'Fecha Final') !!}
                    <div class='input-group date age'>
                        <input id="fechaFin" name="fechaFin" type='text' class="form-control" required/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::submit('Visualizar', ["class" => "btn btn-success btn-lg"]) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection