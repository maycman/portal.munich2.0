@extends("layout")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-1">
            <button class="btn btn-danger" onclick="history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span> Volver</button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <div class="page-header">
                <h1>Informe Telefónico de Servicio</h1>
            </div>
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-2">
    		<div class="c100 green p100">
    			<span>{{ $data['entrantes'] }}</span>
    			<div class="slice">
    				<div class="bar"></div>
    				<div class="fill"></div>
    			</div>
    		</div>
    	</div>
        <div class="col-sm-2">
            <div class="c100 p100">
                <span>{{ $data['contactables'] }}</span>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="c100 orange p100">
                <span>{{ $data['nocontactables'] }}</span>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <p class="lead">Clientes que entraron a Servicio</p>
        </div>
        <div class="col-sm-2">
            <p class="lead">Clientes que desean ser contactados</p>
        </div>
        <div class="col-sm-2">
            <p class="lead">Clientes que no desean ser contactados</p>
        </div>
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