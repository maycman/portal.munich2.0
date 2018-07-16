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
    <div class="row mgn-top">
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
            <div id="chart-div"></div>
            <!--With Blade Templates-->
            <!--@donutchart('contactados', 'chart-div')-->
        </div>
    </div>
</div>
@endsection