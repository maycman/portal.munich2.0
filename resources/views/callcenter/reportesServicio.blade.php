@extends("layout")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-1">
            <button class="btn btn-danger impre" onclick="history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span> Volver</button>
        </div>
    </div>
    <div class="row impre">
        <div class="col-sm-5">
            <div class="page-header">
                <h1>Informe Telefónico de Servicio</h1>
            </div>
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-offset-2 col-sm-2">
    		<div class="c100 green p100">
    			<span>{{ $data['entrantes'] }}</span>
    			<div class="slice">
    				<div class="bar"></div>
    				<div class="fill"></div>
    			</div>
    		</div>
            <p class="lead">Clientes que entraron a Servicio</p>
    	</div>
        <div class="col-sm-2">
            <div class="c100 p100">
                <span>{{ $data['contactables'] }}</span>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>
            <p class="lead">Clientes que desean ser contactados</p>
        </div>
        <div class="col-sm-2">
            <div class="c100 orange p100">
                <span>{{ $data['nocontactables'] }}</span>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>
            <p class="lead">Clientes que no desean ser contactados</p>
        </div>
        <div class="col-sm-offset-1 col-sm-1 impre">
            <button class="btn btn-primary btn-lg" id="imprimir" value="Imprimir">Imprimir</button>
        </div>
        <!--div class="col-sm-offset-1 col-sm-1 impre">
            {!! Form::open(array('url' => '/encuestas/exportar', 'method' => 'post', 'class' => 'form-inline')) !!}
                {!! Form::hidden('entrantes', $data['entrantes'], array('id' => 'entrantes')) !!}
                {!! Form::hidden('contactables', $data['contactables'], array('id' => 'contactables')) !!}
                {!! Form::hidden('nocontactables', $data['nocontactables'], array('id' => 'nocontactables')) !!}
                {!! Form::submit('Imprimir o Guardar PDF', ["class" => "btn btn-primary btn-lg"]) !!}
            {!! Form::close() !!}
        </div-->
    </div>
    <div class="mgn-top row">
        <div class="col-sm-offset-2 col-sm-8">
            <!--With Blade Templates-->
            <div id="chart-div"></div>
            @donutchart('contactados', 'chart-div')
        </div>
    </div>
</div>
@endsection