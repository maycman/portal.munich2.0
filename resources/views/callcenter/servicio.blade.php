@extends("layout")
@section("content")
	<div class="container-fluid">
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
			<div class="col-sm-offset-1 col-sm-4">
				{!! Alert::render() !!}
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<fieldset>
					<legend>Reprogramadas</legend>
					<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Id</th>
								<th>Empresa</th>
								<th>Cliente factura</th>
								<th>Correo electronico</th>
								<th>Cliente contacto</th>
								<th>No. Serie</th>
								<th>Tipo Servicio</th>
								<th>Orden</th>
								<th>Asesor Servicio</th>
								<th>Intentos de contactación</th>
								<th>Fecha Reprogramada</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
						@foreach($reprogramadas as $key => $row)
							<tr>		
								<form class="form" method="get" action="/encuestas/servicio/{{ $row->id_registro }}">
								{!! csrf_field() !!}
								<td>{{ $row->id_registro }}</td>
								<td>{{ $row->razonsocial }}</td>
								<td>{{ $row->nombre.' '.$row->apellido.' '.$row->apellidomaterno }}</td>
								<td>{{ $row->mail }}</td>
								<td>{{ $row->nombre_contacto.' '.$row->apellido_contacto.' '.$row->apellido_materno_contacto }}</td>
								<td>{{ $row->chasis }}</td>
								<td>{{ $row->asesornombre.' '.$row->asesorapp.' '.$row->asesorapm }}</td>
								<td>{{ $row->tiposervicio }}</td>
								<td>{{ $row->noorden }}</td>
								<td>{{ $row->intento }}</td>
								<td>{{ $row->fecha_reprograma }}</td>
								<td>
									@if($row->contacto=='S')
										<button type="submit" class="btn btn-primary" data-target="_blanck">Iniciar Encuesta</button>
									@elseif($row->contacto=='N')
										<button type="button" class="btn btn-default" disabled="disabled">No Contactable</button>
									@endif
								</td>
								</form>
							</tr>
						@endforeach
						</tbody>
					</table>
					</div>
				</fieldset>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<fieldset>
					<legend>Encuestas</legend>
					<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Id</th>
								<th>Empresa</th>
								<th>Cliente factura</th>
								<th>Correo electronico</th>
								<th>Cliente contacto</th>
								<th>No. Serie</th>
								<th>Tipo Servicio</th>
								<th>Orden</th>
								<th>Asesor Servicio</th>
								<th>Intentos de contactación</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
						@foreach($registro as $reg)
							<tr>		
								<form class="form" method="get" action="/encuestas/servicio/{{ $reg->id_registro }}">
								{!! csrf_field() !!}
								<td>{{ $reg->id_registro }}</td>
								<td>{{ $reg->razonsocial }}</td>
								<td>{{ $reg->nombre.' '.$reg->apellido.' '.$reg->apellidomaterno }}</td>
								<td>{{ $reg->mail }}</td>
								<td>{{ $reg->nombre_contacto.' '.$reg->apellido_contacto.' '.$reg->apellido_materno_contacto }}</td>
								<td>{{ $reg->chasis }}</td>
								<td>{{ $reg->tiposervicio }}</td>
								<td>{{ $reg->noorden }}</td>
								<td>{{ $reg->asesornombre.' '.$reg->asesorapp.' '.$reg->asesorapm }}</td>
								<td>{{ $reg->intento }}</td>
								@if(Auth::user()->hasRole('viewer'))
								@else
								<td>
									@if($reg->contacto=='S')
										<button type="submit" class="btn btn-primary" data-target="_blanck">Iniciar Encuesta</button>
									@elseif($reg->contacto=='N')
										<button type="button" class="btn btn-default" disabled="disabled">No Contactable</button>
									@endif
								</td>
								@endif
								</form>
							</tr>
						@endforeach
						</tbody>
					</table>
					</div>
				</fieldset>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-offset-4 col-sm-6">
				{!! $registro->render() !!}
			</div>
		</div>
	</div>
@endsection