@extends("layout")

@section("content")
	<div class="container">
		<div class="row">
			<div class="col-sm-offset-3 col-sm-6">
				<img class="img-responsive img-rounded center-block" src="/assets/images/logo.jpg" alt="Responsive image">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-offset-4 col-sm-4">
				<h1>Gestión de encuestas</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-offset-3 col-sm-3">
				<a class="btn btn-success btn-lg" href="/encuestas/servicio">Encuestas de servicio</a>
			</div>
			<!--div class="col-sm-3">
				<a class="btn btn-success btn-lg" href="/encuestas/ventas">Encuesta de Ventas</a>
			</div-->
		</div>
	</div>
@endsection