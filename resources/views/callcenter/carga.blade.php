@extends("layout")

@section("content")
<div class="container">
    <div class="row">
            <div class="col-sm-1">
                <button class="btn btn-danger" onclick="history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span> Volver</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-offset-1 col-sm-4">
                <h1>Encuestas de servicio</h1>
            </div>
        </div>
        @include('callcenter.menu')
	<div class="row buffer-top">
		<div class="col-sm-4 col-sm-offset-4">
			<h1>Cargar Base</h1>
            {!! Form::open(array('url' => '/encuestas/carga', 'method' => 'post', 'files' => true)) !!}
            	<div class="form-group">
            		{!! Form::label('file', 'Carga: ') !!}
            		<span class="btn btn-default btn-file">
            			Selecciona la base de datos
            			{!! Form::file('base', ["required", "id"=>"cargaFile"]) !!}
                    </span>
                    <span id="nombre"></span>
                </div>
                <div class="form-group">
                	{!! Form::submit('Alimentar Base de Datos', ["class" => "btn btn-success btn-block btn-lg"]) !!}
                </div>
            {!! Form::close() !!}
		</div>
	</div>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            {!! Alert::render() !!}
        </div>
    </div>
</div>
@endsection