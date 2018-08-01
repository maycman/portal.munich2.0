@extends("layout")
@section("content")
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-1">
				<button class="btn btn-danger" onclick="history.back(-1)"><span class="glyphicon glyphico	n-menu-left"></span> Volver</button>
			</div>
			<div class="col-sm-11">
				<table class="table">
					<tr>
						<th>
							@lang('auth.empresa')
						</th>
						<td>
							{{ $consulta->razonsocial }}
						</td>

						<th>@lang('auth.nombre')</th>
						<td>{{ $consulta->nombre.' '.$consulta->apellido.' '.$consulta->apellidomaterno}}</td>

						<th>@lang('auth.sexo')</th>
						<td>{{ $consulta->sexo }}</td>

						<th>@lang('auth.telefono1')</th>
						<td>{{ '('.$consulta->lada.') '.$consulta->telefono1 }}</td>

						<th>@lang('auth.ext')</th>
						<td>{{ $consulta->ext1 }}</td>
					</tr>
					<tr>
						<th>@lang('auth.celular')</th>
						<td>{{ '('.$consulta->lada_celular.') '.$consulta->celular }}</td>

						<th>@lang('auth.telefono3')</th>
						<td>{{ '('.$consulta->lada3.') '.$consulta->telefono3 }}</td>

						<th>@lang('auth.telefono4')</th>
						<td>{{ '('.$consulta->lada4.') '.$consulta->telefono4 }}</td>
					</tr>
					<tr>
						<th>@lang('auth.email')</th>
						<td>{{ $consulta->mail }}</td>

						<th>@lang('auth.email2')</th>
						<td>{{ $consulta->mail2 }}</td>
					</tr>
					<tr>
						<th>@lang('auth.contacto')</th>
						<td>{{ $consulta->nombre_contacto.' '.$consulta->apellido_contacto.' '.$consulta->apellido_materno_contacto }}</td>

						<th>@lang('auth.telefonoc')</th>
						<td>{{ '('.$consulta->lada_contacto.') '.$consulta->telefono_contacto }}</td>
					</tr>
					<tr>
						<th>@lang('auth.modelo')</th>
						<td>{{ $consulta->nombremodelo }}</td>

						<th>@lang('auth.chasis')</th>
						<td>{{ $consulta->chasis }}</td>

						<th>@lang('auth.placa')</th>
						<td>{{ $consulta->placa }}</td>

						<th>@lang('auth.fechaS')</th>
						<td>{{ $consulta->fechaservicio }}</td>

						<th>@lang('auth.tipo')</th>
						<td>{{ $consulta->tiposervicio }}</td>

					</tr>
					<tr>
						<th>@lang('auth.orden')</th>
						<td>{{ $consulta->noorden }}</td>

						<th>@lang('auth.año')</th>
						<td>{{ $consulta->añomodelo }}</td>

						<th>@lang('auth.asesor')</th>
						<td>{{ $consulta->asesornombre.' '.$consulta->asesorapp.' '.$consulta->asesorapm }}</td>
					</tr>
					<tr>
						<th>@lang('auth.c')</th>
						<td>{{ $consulta->comentarios }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="jumbotron">
			<h3>Buenas tardes Sr/Sra. <strong>{{ $consulta->nombre.' '.$consulta->ap_paterno.' '.$consulta->ap_materno }}</strong> mi nombre es: <strong>nombre del ejecutivo</strong> le llamo de Volkswagen Munich Automotríz atención a clientes, el motivo de mi llamada es para brindarle un mejor servicio y ponerme a sus ordenes ya que recientemente nos visitó, si me permite unos minutos de su tiempo, le realizare algunas preguntas acerca de el servicio que recibio para su vehiculo.</h3>
		</div>
		<form class="form" name="guardarEncuesta" method="post" action="{{ url('/encuestas/servicio') }}">
			{{ csrf_field() }}
			{!! Form::hidden('id_registro', $consulta->id_registro, array('id' => 'id_registro')) !!}
			{!! Form::hidden('id_encuesta', $encuesta->id_encuesta, array('id' => 'id_encuesta')) !!}
			<div class="row">
				<div class="col-sm-offset-4">
					<div class="form-group">
						<label role="intentos_llamada">¿Contactable?</label>
						<input onchange="intentos()" id="contactable" name="contactable" type="checkbox" data-toggle="toggle" data-size="large" data-on="Si" data-off="No" checked>
					</div>
				</div>
			</div>
			<div id="noContacto" class="hide">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
					<div class="form-group">
						<select id="razon" name="razon" class="form-control">
							<option disabled selected value></option>
							<option>Buzón</option>
							<!--option>No tiene horario fijo</option-->
							<option>No contesta</option>
							<option>Número no existe</option>
							<option>Número fuera del área de servicio</option>
							<option>Número equivocado</option>
						</select>
					</div>
					</div>
				</div>
			</div>
			<div id="contacto">
			<div class="row separa">
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-4">
						<div class="form-group">
							<label role="aceptaEncuesta">¿Acepta Encuesta?</label>
							<input onchange="aceptaEncuesta()" id="acepta" name="acepta" type="checkbox" data-toggle="toggle" data-size="large" data-on="Si" data-off="No" checked>
						</div>
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
								<select id="1" name="1" class="form-control" required>
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
										<select onchange="pregunta2()" id="2" name="2" class="form-control" required>
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
											<select id="3" name="3" class="form-control">
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
											<select id="4" name="4" class="form-control">
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
											<select id="5" name="5" class="form-control">
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
											<select id="6" name="6" class="form-control">
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
											<select id="7" name="7" class="form-control">
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
											<select id="8" name="8" class="form-control">
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
										<input onchange="pregunta3()" id="9" name="9" type="checkbox" data-toggle="toggle" data-size="medium" data-on="Si" data-off="No" checked>
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
      												<input type="checkbox" name="10" id="10"> Disponibilidad de refacciones.
    											</label>
  											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<div class="checkbox">
    											<label>
      												<input type="checkbox" name="11" id="11"> No se pudo encontrar el problema.
    											</label>
  											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<div class="checkbox">
    											<label>
      												<input type="checkbox" name="12" id="12"> Se volvió a presentar la falla.
    											</label>
  											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<div class="checkbox">
    											<label>
      												<input type="checkbox" name="13" id="13"> No se realizarón todos los trabajos o se realizarón parcialmente.
    											</label>
  											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<div class="checkbox">
    											<label>
      												<input type="checkbox" name="14" id="14"> El taller causó un nuevo problema.
    											</label>
  											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<div class="checkbox">
    											<label>
      												<input type="checkbox" name="15" id="15"> El taller negó que hubiera un problema/Afirmó que era normal.
    											</label>
  											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<div class="checkbox">
    											<label>
      												<input type="checkbox" name="16" id="16"> El taller estaba demaciado ocupado para terminar todo el trabajo necesario.
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
      										<textarea class="form-control" id="17" name="17" placeholder="Descríbalo"></textarea>
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
										<select onchange="pregunta4()" id="18" name="18" class="form-control" required>
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
											<select id="19" name="19" class="form-control">
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
											<select id="20" name="20" class="form-control">
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
											<select id="21" name="21" class="form-control">
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
											<select id="22" name="22" class="form-control">
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
										<select onchange="pregunta5()" id="23" name="23" class="form-control" required>
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
											<select id="24" name="24" class="form-control">
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
											<select id="25" name="25" class="form-control">
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
											<select id="26" name="26" class="form-control">
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
											<select id="27" name="27" class="form-control">
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
									<select id="28" name="28" class="form-control" required>
										<option disabled selected value></option>
										@for($i=1; $i<11; $i++)
										<option>{{$i}}</option>
										@endfor
									</select>
								</div>
								<div class="form-group">
									<label role="prengunta6a">6a. ¿Por qué?</label>
									<textarea id="29" name="29" class="form-control" required></textarea>
								</div>
							</div><!--well-->
						</div><!--col-sm-12-->
					</div><!--row pregunta 6-->
					<div class="row">
						<div class="col-sm-12">
							<div class="well">
								<div class="form-group">
									<label role="pregunta7">7. ¿Qué probabilidad hay de que su próxima reparación o servicio sea en esta misma concesionaria?</label>
									<select id="30" name="30" class="form-control" required>
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
							<textarea id="31" name="31" class="form-control"></textarea>
						</div>
					</div>
					<div class="jumbotron separa">
						<h3>Le agradezco haber tomado mi llamada, mi nombre es: <strong>nombre del ejecutivo</strong> que siga disfrutando de su auto. Seguimos a sus ordenes en Munich Automotriz.</h3>
					</div>
				</div><!--Questions-->
			</div><!--Preguntas-->
			</div><!--Contacto-->
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
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