@extends("layout")

@section("content")
<div class="container">
	<div class="row buffer-top">
		<div class="col-sm-4 col-sm-offset-3">
			<h1>Cargar Base</h1>
            {!! Form::open(array('url' => 'cargando', 'method' => 'post', 'files' => true)) !!}
            	<div class="form-group">
            		{!! Form::label('file', 'Carga: ') !!}
            		<span class="btn btn-default btn-file">
            			Selecciona la base de datos
            			{!! Form::file('base', ["required"]) !!}
                    </span>
                </div>
                <div class="form-group">
                	{!! Form::submit('Alimentar Base de Datos', ["class" => "btn btn-success btn-block btn-lg"]) !!}
                </div>
            {!! Form::close() !!}
		</div>
	</div>
    {!! Alert::render() !!}
</div>
@endsection