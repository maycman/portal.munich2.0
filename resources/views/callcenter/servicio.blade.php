@extends("layout")
@section("content")
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-1">
				<button class="btn btn-danger" onclick="history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span> Volver</button>
			</div>
			<div class="col-sm-11">
				<h1>Encuestas de servicio</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-offset-1 col-sm-2">
				{!! Alert::render() !!}
			</div>
		</div>
		<div class="row">
			<div class="col-sm-offset-4 col-sm-6">
				{!! $registro->render() !!}
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<!--div class="table-responsive"-->
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Orden</th>
								<th>Fecha Orden</th>
								<th>Modelo</td>
								<th>Modelo Año</th>
								<!--th>Año de fabricación</th-->
								<th>No. Serie</th>
								<th>Contactable</th>
								<th>Correo electronico</th>
								<th>Empresa</th>
								<th>Cliente factura</th>
								<th>Cliente contacto</th>
								<th>Asesor Servicio</th>
								<th>Tipo Servicio</th>
								<th>Servicio Realizado y/o reparación</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
						@foreach($registro as $reg)
							<tr>		
								<form class="form" method="get" action="servicio/{{ $reg->id_registro }}">
								{!! csrf_field() !!}
								<td>{{ $reg->no_orden }}</td>
								<td>{{ $reg->fecha_insercion }}</td>
								<td>{{ $reg->nombre_modelo }}</td>
								<td>{{ $reg->ano_modelo }}</td>
								<!--td>Vacio aún</td-->
								<td>{{ $reg->chasis }}</td>
								<td>{{ $reg->contactable }}</td>
								<td>{{ $reg->email }}</td>
								<td>{{ $reg->empresa }}</td>
								<td>{{ $reg->nombre.' '.$reg->ap_paterno.' '.$reg->ap_materno }}</td>
								<td>{{ $reg->nombre_contacto.' '.$reg->app_contacto.' '.$reg->apm_contacto }}</td>
								<td>{{ $reg->nombre_asesor.' '.$reg->app_asesor.' '.$reg->apm_asesor }}</td>
								<td>{{ $reg->tipo_servicio }}</td>
								<td>{{ number_format($reg->KM) }}</td>
								<td>
									@if($reg->contactable=='S')
										<button type="submit" class="btn btn-primary" data-target="_blanck">Iniciar Encuesta</button>
									@elseif($reg->contactable=='N')
										<button type="button" class="btn btn-default" disabled="disabled">No Contactable</button>
									@endif
								</td>
								</form>
							</tr>
						@endforeach
						</tbody>
					</table>
				<!--/div-->
			</div>
		</div>
	</div>
@endsection