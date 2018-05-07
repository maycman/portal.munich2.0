@extends("layout")
@section("content")
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-1">
				<button class="btn btn-danger" onclick="history.back(-1)"><span class="glyphicon glyphico	n-menu-left"></span> Volver</button>
			</div>
			<div class="col-sm-2">
				<div class="alert alert-success">
					<p><strong>Fecha entrada: </strong>{{ $consulta->fecha_entrada }}</p>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="alert alert-success">
					<p><strong>Fecha factura: </strong>{{ $consulta->fecha_insercion }}</p>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="alert alert-success">
					<p><strong>Automovil: </strong>{{ $consulta->nombre_modelo }}</p>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="alert alert-success">
					<p><strong>Modelo: </strong>{{ $consulta->ano_modelo }}</p>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="alert alert-success">
					<p><strong>No. Serie: </strong>{{ $consulta->chasis }}</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 col-sm-offset-1">
				<div class="alert alert-success">
					<p><STRONG>Empresa: </STRONG>{{ $consulta->razon_social }}</p>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="alert alert-success">
					<p><STRONG>Nombre: </STRONG>{{ $consulta->nombre.' '.$consulta->ap_paterno.' '.$consulta->ap_materno}}</p>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="alert alert-success">
					<p><strong>Telefono:</strong>{{ '('.$consulta->lada.') '.$consulta->telefono1 }}</p>
					<p><strong>Ext: </strong>{{ $consulta->ext1 }}</p>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="alert alert-success">
					<p><strong>Celular: </strong>{{ '('.$consulta->lada_cel.') '.$consulta->celular }}</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<div class="alert alert-success">
					<p><strong>Telefono 2: </strong> {{ '('.$consulta->lada3.') '.$consulta->telefono3 }}</p>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="alert alert-success">
					<p><strong>Telefono 3: </strong>{{ '('.$consulta->lada4.') '.$consulta->telefono4 }}</p>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="alert alert-success">
					<p><strong>Correo electronico: </strong>{{ $consulta->email }}</p>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="alert alert-success">
					<p><strong>Correo electronico alterno: </strong>{{ $consulta->email2 }}</p>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="alert alert-success">
					<p><strong>Contacto: </strong>{{ $consulta->nombre_contacto.' '.$consulta->app_contacto.' '.$consulta->apm_contacto }}</p>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="alert alert-success">
					<p><strong>Telefono contacto: </strong>{{ '('.$consulta->lada_contacto.') '.$consulta->telofono_contacto}}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="jumbotron">
			<h3>Buenas tardes Sr/Sra. <strong>{{ $consulta->nombre.' '.$consulta->ap_paterno.' '.$consulta->ap_materno }}</strong> mi nombre es: <strong>nombre del ejecutivo</strong> le llamo de Volkswagen Munich Automotríz atención a clientes, el motivo de mi llamada es para brindarle un mejor servicio y ponerme a sus ordenes ya que recientemente nos visitó, si me permite unos minutos de su tiempo, le realizare algunas preguntas acerca de el servicio que recibio para su vehiculo.</h3>
		</div>
		<form class="form" name="guardarEncuesta" method="post" action="{{ url('/encuestas/servicio/guardar') }}">
			{{ csrf_field() }}
			{!! Form::hidden('id_registro', $consulta->id_registro, array('id' => 'id_registro')) !!}
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="form-group">
						<label role="aceptaEncuesta">¿Acepta Encuesta?</label>
						<input onchange="aceptaEncuesta()" id="acepta" type="checkbox" data-toggle="toggle" data-size="large" data-on="Si" data-off="No" checked>
					</div>
				</div>
			</div>
			<div id="preguntas">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
						<div class="form-group">
							<label role="Llamar mas tarde">¿Reprogramar Llamada?</label>
							<input onchange="llamarLuego()" id="butonReprograma" name="butonReprograma" type="checkbox" data-toggle="toggle" data-size="large" data-on="Si" data-off="No">
						</div>
						<div id="agendar" class="form-group hide">
                			<div class='input-group date picker'>
                    			<input type='text' id="reprograma" name="reprograma" class="form-control"/>
                    			<span class="input-group-addon">
                        			<span class="glyphicon glyphicon-calendar"></span>
                    			</span>
                			</div>
            			</div>
					</div>
				</div>
				<div id="questions">
					<div class="row">
						<div class="col-sm-12">
							<div class="well">
								<label role="pregunta1">1. Califique su experiencia de servicio en general en la concesionaria Volkswagen Munich Automotriz.</label>
								<select id="p1" name="p1" class="form-control" required>
									<option disabled selected value></option>
									@for($i=1; $i<11; $i++)
									<option>{{$i}}</option>
									@endfor
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="well">
								<div class="row">
									<div class="col-sm-12">
										<label role="pregunta2">2. ¿Qué tan satisfecho está con su Asesor de Servicio?</label>
										<select onchange="pregunta2()" id="p2" name="p2" class="form-control" required>
											<option disabled selected value></option>
											@for($i=1; $i<11; $i++)
											<option>{{$i}}</option>
											@endfor
										</select>
									</div>
								</div>
								<div id="p2Negativo" class="collapse">
									<div class="row">
										<div class="col-sm-12">
											<label>Por favor califique los siguientes aspectos.</label>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta2a">2a. La cortesía, responsabilidad y honestidad por parte de nuestro asesor de servicio.</label>
											<select id="p2a" name="p2a" class="form-control">
												<option disabled selected value></option>
												@for($i=1; $i<11; $i++)
												<option>{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta2b">2b. Revisión de los componentes del vehículo (por ej. gomas de los limpiaparabrisas, pastillas de frenos, etc.) y explicación de los trabajos a realizar frente al vehículo durante la recepción.</label>
											<select id="p2b" name="p2b" class="form-control">
												<option disabled selected value></option>
												@for($i=1; $i<11; $i++)
												<option>{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta2c">2c. Mantenerlo informado del avance del trabajo de servicio.</label>
											<select id="p2c" name="p2c" class="form-control">
												<option disabled selected value></option>
												@for($i=1; $i<11; $i++)
												<option>{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta2d">2d. La condición del vehículo en la entrega (Por ej. limpio, sin daños, controles y posiciones sin cambios).</label>
											<select id="p2d" name="p2d" class="form-control">
												<option disabled selected value></option>
												@for($i=1; $i<11; $i++)
												<option>{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta2e">2e. La explicación de los trabajos realizados.</label>
											<select id="p2e" name="p2e" class="form-control">
												<option disabled selected value></option>
												@for($i=1; $i<11; $i++)
												<option>{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta2f">2f. Explicación de la factura y lo justo del cobro.</label>
											<select id="p2f" name="p2f" class="form-control">
												<option disabled selected value></option>
												@for($i=1; $i<11; $i++)
												<option>{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
								</div><!--Termina respuestas negativas de pregunta 2-->
							</div><!--/well-->
						</div><!--col-sm-12-->
					</div><!--row pregunta 2-->
					<div class="row">
						<div class="col-sm-12">
							<div class="well">
								<div class="row">
									<div class="col-sm-12">
										<label role="Pregunta3">3. ¿Se completo todo el trabajo la primera vez?</label>
										<br>
										<input onchange="pregunta3()" id="p3" name="p3" type="checkbox" data-toggle="toggle" data-size="medium" data-on="Si" data-off="No" checked>
									</div>
								</div>
								<div id="p3Negativa" class="collapse">
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta3a">3a. ¿Por qué motivo?</label>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1 separa">
											<div class="checkbox">
    											<label>
      												<input type="checkbox" name="ra" id="ra"> Disponibilidad de refacciones.
    											</label>
  											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<div class="checkbox">
    											<label>
      												<input type="checkbox" name="rb" id="rb"> No se pudo encontrar el problema.
    											</label>
  											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<div class="checkbox">
    											<label>
      												<input type="checkbox" name="rc" id="rc"> Se volvió a presentar la falla.
    											</label>
  											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<div class="checkbox">
    											<label>
      												<input type="checkbox" name="rd" id="rd"> No se realizarón todos los trabajos o se realizarón parcialmente.
    											</label>
  											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<div class="checkbox">
    											<label>
      												<input type="checkbox" name="re" id="re"> El taller causó un nuevo problema.
    											</label>
  											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<div class="checkbox">
    											<label>
      												<input type="checkbox" name="rf" id="rf"> El taller negó que hubiera un problema/Afirmó que era normal.
    											</label>
  											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<div class="checkbox">
    											<label>
      												<input type="checkbox" name="rg" id="rg"> El taller estaba demaciado ocupado para terminar todo el trabajo necesario.
    											</label>
  											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<div class="checkbox">
    											<label>
      												<input onchange="respOtro()" type="checkbox" name="rh" id="rh"> Otro.
    											</label>
  											</div>
										</div>
									</div>
									<div id="textOtro" class="row collapse">
										<div class="col-sm-5 col-sm-offset-1">
      										<textarea class="form-control" id="hrComent" name="rhComent" placeholder="Descríbalo"></textarea>
										</div>
									</div>
								</div><!--p3Negativa-->
							</div><!--well-->
						</div><!--col-sm-12-->
					</div><!--row prenguta 3-->
					<div class="row">
						<div class="col-sm-12">
							<div class="well">
								<div class="row">
									<div class="col-sm-12">
										<label role="pregunta4">4. ¿Qué tan satisfecho está con el tiempo transcurrido para que el servicio fuera completado?</label>
										<select onchange="pregunta4()" id="p4" name="p4" class="form-control" required>
											<option disabled selected value></option>
											@for($i=1; $i<11; $i++)
											<option>{{$i}}</option>
											@endfor
										</select>
									</div>
								</div>
								<div id="p4Negativa" class="collapse">
									<div class="row">
										<div class="col-sm-12">
											<label>Por favor califique los siguientes aspectos.</label>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta4a">4a. Facilidad y disponibilidad para agendar cita.</label>
											<select id="p4a" name="p4a" class="form-control">
												<option disabled selected value></option>
												@for($i=1; $i<11; $i++)
												<option>{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta4b">4b. Tiempo en la recepción de su vehículo.</label>
											<select id="p4b" name="p4b" class="form-control">
												<option disabled selected value></option>
												@for($i=1; $i<11; $i++)
												<option>{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta4c">4c. Tiempo en la entrega de su vehículo.</label>
											<select id="p4c" name="p4c" class="form-control">
												<option disabled selected value></option>
												@for($i=1; $i<11; $i++)
												<option>{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta4d">4d. Tiempo total requerido para completar el servicio de su vehículo.</label>
											<select id="p4d" name="p4d" class="form-control">
												<option disabled selected value></option>
												@for($i=1; $i<11; $i++)
												<option>{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
								</div><!--p4Negativa-->
							</div><!--well-->
						</div><!--col-sm-12-->
					</div><!--row pregunta 4-->
					<div class="row">
						<div class="col-sm-12">
							<div class="well">
								<div class="row">
									<div class="col-sm-12">
										<label role="pregunta5">5. ¿Cuál es su nivel de satisfacción con las instalaciones de la concesionaria y amenidades ofrecidas?</label>
										<select onchange="pregunta5()" id="p5" name="p5" class="form-control" required>
											<option disabled selected value></option>
											@for($i=1; $i<11; $i++)
											<option>{{$i}}</option>
											@endfor
										</select>
									</div>
								</div>
								<div id="p5Negativo" class="collapse">
									<div class="row">
										<div class="col-sm-12">
											<label>Por favor califique los siguientes aspectos.</label>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta5a">5a. Facilidad para entrar y salir.</label>
											<select id="p5a" name="p5a" class="form-control">
												<option disabled selected value></option>
												@for($i=1; $i<11; $i++)
												<option>{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta5b">5b. Limpieza de la concesionaria.</label>
											<select id="p5b" name="p5b" class="form-control">
												<option disabled selected value></option>
												@for($i=1; $i<11; $i++)
												<option>{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta5c">5c. Comodidad en el área de espera.</label>
											<select id="p5c" name="p5c" class="form-control">
												<option disabled selected value></option>
												@for($i=1; $i<11; $i++)
												<option>{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<label role="pregunta5d">5d. Amenidades ofrecidas por la concesionaria (por ej. Bebidas, wifi, snacks, revistas, etc).</label>
											<select id="p5d" name="p5d" class="form-control">
												<option disabled selected value></option>
												@for($i=1; $i<11; $i++)
												<option>{{$i}}</option>
												@endfor
											</select>
										</div>
									</div>
								</div><!--p5Negativo-->
							</div><!--well-->
						</div><!--col-sm-12-->
					</div><!--row pregunta 5-->
					<div class="row">
						<div class="col-sm-12">
							<div class="well">
								<div class="form-group">
									<label role="pregunta6">6. ¿Qué tan satisfecho está con la calidad del auto?</label>
									<select id="p6" name="p6" class="form-control" required>
										<option disabled selected value></option>
										@for($i=1; $i<11; $i++)
										<option>{{$i}}</option>
										@endfor
									</select>
								</div>
								<div class="form-group">
									<label role="prengunta6a">6a. ¿Por qué?</label>
									<textarea id="p6a" name="p6a" class="form-control" required></textarea>
								</div>
							</div><!--well-->
						</div><!--col-sm-12-->
					</div><!--row pregunta 6-->
					<div class="row">
						<div class="col-sm-12">
							<div class="well">
								<div class="form-group">
									<label role="pregunta7">7. ¿Qué probabilidad hay de que su próxima reparación o servicio sea en esta misma concesionaria?</label>
									<select id="p7" name="p7" class="form-control" required>
										<option disabled selected value></option>
										@for($i=1; $i<11; $i++)
										<option>{{$i}}</option>
										@endfor
									</select>
								</div>
							</div><!--well-->
						</div><!--col-sm-12-->
					</div><!--row pregunta 7-->
					<div class="row">
						<div class="col-sm-offset-3 col-sm-6 separa">
							<label role="comentarios">Comentarios</label>
							<textarea id="comentarios" name="comentarios" class="form-control"></textarea>
						</div>
					</div>
				</div><!--Questions-->
			</div><!--Preguntas-->
			<div class="row">
				<div class="col-sm-4 col-sm-offset-2">
					<div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-lg buttonForm">Guardar Encuesta</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection