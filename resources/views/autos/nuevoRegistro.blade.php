<div class="modal fade bs-example-modal-lg" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title">Nuevo Registro</h4>
      	</div>
      	<div class="modal-body">
      	{!! Form::open(array('url' => '/4semanas/guardando', 'method' => 'post')) !!}
      		<fieldset>
  				<legend>Datos del auto</legend>
  				<div class="form-inline">
      				<div class="form-group">
      					<label role="fecha_llegada">Fecha llegada</label>
      					<div class='input-group date age'>
                    		<input id="fecha_llegada" name="fecha_llegada" type='text' class="form-control" required/>
                    		<span class="input-group-addon">
                        		<span class="glyphicon glyphicon-calendar"></span>
                    		</span>
                		</div>
      				</div>
      				<div class="form-group mgn-left">
      					<label role="chasis">Chasis</label>
      					<input type="text" id="chasis" name="chasis" class="form-control" required>
      				</div>
      				<div class="form-group">
      					<label role="tipo">Tipo de automovil</label>
      					<input type="text" name="tipo_auto" id="tipo_auto" class="form-control" required>
      				</div>
      			</div>
      		</fieldset>
      		<div class="form-group mgn-top">
				<label role="aceptaEncuesta">¿Agregar datos de servicio?</label>
				<input onchange="agregarServicio()" id="boton" type="checkbox" data-toggle="toggle" data-size="large" data-on="Si" data-off="No">
			</div>
			<div id="datosServicio" class="hide">
      		<fieldset>
      			<legend>Datos de servicio</legend>
      			<div class="form-inline">
      				<div class="form-group">
      					<label role="ultimo_servicio">Ultimo servicio realizado</label>
      					<input type="text" name="ultimo_servicio" id="ultimo_servicio" class="form-control">
      				</div>
      				<div class="form-group mgn-left">
      					<label role="fecha_ultimo_servicio">Fecha de ultimo servicio</label>
      					<div class='input-group date age'>
                    		<input id="fecha_ultimo_servicio" name="fecha_ultimo_servicio" type='text' class="form-control" />
                    		<span class="input-group-addon">
                        		<span class="glyphicon glyphicon-calendar"></span>
                    		</span>
                		</div>
      				</div>
      				<div class="form-group mgn-top">
      					<label role="servicio_pendiente">Servicio pendiente</label>
      					<input type="text" name="servicio_pendiente" id="servicio_pendiente" class="form-control">
      				</div>
              <div class="form-group">
                <label role="fecha_servicio_pendiente">Fecha servicio pendiente</label>
                <div class='input-group date age'>
                        <input id="fecha_servicio_pendiente" name="fecha_servicio_pendiente" type='text' class="form-control">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
              </div>
      				<div class="form-group mgn-top mgn-left">
      					<label role="proximo_servicio">Proximo servicio</label>
      					<input type="text" name="proximo_servicio" id="proximo_servicio" class="form-control">
      				</div>
      				<div class="form-group mgn-top">
      					<label role="fecha_proximo_servicio">Fecha proximo servicio</label>
      					<div class='input-group date age'>
                    		<input id="fecha_proximo_servicio" name="fecha_proximo_servicio" type='text' class="form-control" />
                    		<span class="input-group-addon">
                        		<span class="glyphicon glyphicon-calendar"></span>
                    		</span>
                		</div>
      				</div>
      				<div class="form-group mgn-top mgn-left">
      					<label role="tecnico">Tecnico que llevó el servicio</label>
      					<input type="text" name="tecnico" id="tecnico" class="form-control">
      				</div>
      			</div>
      		</fieldset>
      		</div>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        	{!! Form::submit('Guardar', ["class" => "btn btn-success"]) !!}
          {!! Form::close() !!}
      	</div>
    </div>
  </div>
</div>