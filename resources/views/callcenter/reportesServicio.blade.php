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
    <!--div class="row mgn-top">
        <div class="col-sm-12">
            {!! Form::open(array('url' => '/encuestas/reportes', 'method' => 'post', 'class'=>'form-inline')) !!}
                <div class="form-group">
                    <label>Chasis:</label>
                    <input type="text" class="form-control" name="chasis" id="chasis" required>
                </div>
                {!! Form::submit('Buscar', ["class" => "btn btn-success"]) !!}
            {!! Form::close() !!}
        </div>
    </div-->
    <div class="row">
    	<div class="col-sm-3">
    		<div class="c100 p50">
    			<span>50%</span>
    			<div class="slice">
    				<div class="bar"></div>
    				<div class="fill"></div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="row">
        <div class="col-sm-9">
            <!--With Blade Templates-->
            <div id="chart-div"></div>
            @donutchart('contactados', 'chart-div')
        </div>
    </div>
</div>
@endsection