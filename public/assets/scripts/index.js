$(document).ready(function(){
	classActive();
	calendarioForms();
	formBuscar();
});


/************************Funciones******************************/


function classActive()
{
	//Asigna la clase 'active' de bootstrap en la pestaña del menu actual

	//Primero obtenemos la palabra despues de la ultima '/'
	var pag = location.href.substring(location.href.lastIndexOf('/')+1, location.href.lastIndexOf(''));
	//Evaluamos en que pagina estamos
	if (pag=="encuesta")
	{
		$('#'+pag).addClass("active");
		$('#mdrop').addClass("active");
	}
	else if(pag=='carga')
	{
		$('#'+pag).addClass("active");
		$('#mdrop').addClass("active");
	}
	else if(pag=='4semanas')
	{
		$('#'+pag).addClass("active");
		$('#servicioDrop').addClass("active");
	}
	else if(pag=="")
	{
		$('#home').addClass("active");
	}
}
function calendarioForms()
{
	//Esta funcion hace que los input de fechas en cada formulario muestran un calendario

	//Agrega DateTimePicker a la clase picker
	$('.picker').datetimepicker();
	//Agrega un formato unicamente con fecha mes/día/año sin timer
	$('.age').datetimepicker({
		format: 'L'
	});
	//$('.nuevaFecha').datepicker('update', new Date());
}
function aceptaEncuesta()
{
	//Esta funcion esconde o muestra la encuesta en el apartado de CallCenter->Encuestas->encuesta servicio->Iniciar Encuesta
	var butt = $('#acepta');
	var form = $('#preguntas');
	if (butt.prop('checked'))
	{
        //Este removeClass hace que al darle click muchas veces siempre funcione el checkbox
        form.removeClass();
        //Activamos los campos de la encuesta
        //Desactivamos todos los input del div Preguntas
       	form.find('input, textarea, button, select').attr('disabled', false);
       	//Le damos animación a los campos
       	form.addClass('animated rollIn');

    }
    else
    {
        form.removeClass();
        //Crea una animacion para ocultar la encuesta pero deja un espacio grande
       	form.addClass('animated rollOut');
       	//Eliminamos del DOM todos los input innesesarios
       	//form.remove('input');
       	//Desactivamos todos los campos del div Preguntas
       	form.find('input, textarea, button, select').attr('disabled', true);
       	//Se agrega una clase despues del tiempo de la animación para ocultarla completamente
       	setTimeout(function(){form.addClass('hide');}, 500);
    }
}
function llamarLuego()
{
	/*Esta funcion permite ocultar la encuesta y mostrar un input para reprogramarla de nuevo en la parte de
	  CallCenter->Encuestas->Encuesta Servicio->Iniciar encuesta*/
	var llamar = $('#butonReprograma');
	var encuesta = $('#questions');
	var fecha = $('#agendar');
	var inputFecha = $('#reprogramar');
    if (llamar.prop('checked'))
    {
    	//Estos removeClass hacen que al darle click muchas veces siempre funcione el checkbox
    	encuesta.removeClass();
    	fecha.removeClass();
    	//Agregamos animación de entrada al input de fecha para reprogramar la encuesta
    	fecha.addClass('form-group animated flipInX');
    	//activamos eel campo de reprogramar
    	inputFecha.attr('disabled',false);
    	//Agregamos animación de salida para el encuesta y poder ocultarla
    	encuesta.addClass('animated zoomOut');
    	//Desactivamos todos los campos del div questions
    	encuesta.find('input, textarea, button, select').attr('disabled', true);
    	//Escondemos realmente la encuesta despues de todas las animaciones
        setTimeout(function(){encuesta.addClass('hide');}, 500);
    }
    else
    {
        encuesta.removeClass();
        fecha.removeClass();
        //Escondemos el input de reprogramar
        fecha.addClass('form-group animated flipOutX');
        //desactivamos el campo de reprogramar
        inputFecha.attr('disabled',true);
        //Animamos la entrada de la encuesta
        encuesta.addClass('animated zoomIn');
        //Activamos de nuevo los campos de la encuesta
        encuesta.find('input, textarea, button, select').attr('disabled', false);
        //escondemos realmente el input de reprogramar
        setTimeout(function(){fecha.addClass('hide');}, 500);
    }
}

/*Todas las funciones con nombre preguntaX ocultan o muestran prenguntas adicionales en la encuesta en
  CallCenter->encuestas->encuesta Servicio->iniciar encuesta*/

function pregunta2()
{
	var select = $("#p2");
	var content = $("#p2Negativo");
	if (select.val()<=7)
	{
		content.removeClass();
		content.addClass('animated zoomIn separa');
	}
	else
	{
		content.removeClass();
		content.addClass("animated zoomOut");
		setTimeout(function(){content.addClass('hide');}, 500);
		content.find('input, textarea, button, select').attr('disabled', true);
	}
}

function pregunta3()
{
	var select = $("#p3");
	var content = $("#p3Negativa");
	if (!select.prop('checked'))
	{
		content.removeClass();
		content.addClass('animated zoomIn separa');
	}
	else
	{
		content.removeClass();
		content.addClass("animated zoomOut");
		setTimeout(function(){content.addClass('hide');}, 500);
		content.find('input, textarea, button, select').attr('disabled', true);
	}
}
function respOtro()
{
	var check = $('#rh');
	var content = $('#textOtro');
	if(check.prop('checked'))
	{
		content.removeClass();
		content.addClass(' row animated zoomIn');
	}
	else
	{
		content.removeClass();
		content.addClass(" row animated zoomOut");
		setTimeout(function(){content.addClass('hide');}, 500);
		content.find('input, textarea, button, select').attr('disabled', true);
	}
}
function pregunta4()
{
	var select = $('#p4');
	var content = $('#p4Negativa');
	if (select.val()<=7)
	{
		content.removeClass();
		content.addClass('animated zoomIn separa');
	}
	else
	{
		content.removeClass();
		content.addClass("animated zoomOut");
		setTimeout(function(){content.addClass('hide');}, 500);
		content.find('input, textarea, button, select').attr('disabled', true);
	}
}



function agregarServicio()
{
	//Esta función oculta o muestra campos para agregar el servicio desde que ingresas un nuevo auto en Servicio->4 semanas->nuevo registro
	var button = $("#boton");
	var campos = $("#datosServicio");
	if (button.prop('checked'))
	{
		campos.removeClass();
		campos.addClass('animated zoomIn separa');
	}
	else
	{
		campos.addClass("animated zoomOut");
		setTimeout(function(){campos.addClass('hide');}, 500);
	}
}
function liberarAuto()
{
	/*Esta funcion funge como submit real al liberar un auto en servicio->4 semanas ya que al darle al boton ubicado en la interfas del usuario solo abre
	  un modal con un boton que ejecuta esta instruccion donde 'liberar' es un elemento tipo submit que se encuentra en la vista con el form y el id listo
	  para hacer la eliminación logica.*/
	document.getElementById('liberar').click();
}
function modificarFecha(param)
{
	/*Esta funcion es para el apartado de Servicio->4 semanas->Agregar servicio para la correcta recolección de las fechas*/

	/*Primero obtener el id de la fecha a cambiar ya que el input es readonly y aun no tiene la propiedad Datetimepicker con la propiedad substring
	  quitamos los primeros 8 caracteres de la variable param para obtener parte del id correcto algo similar a 'fecha_llegada' este ser el id del input*/
    idInput = param.substring(8);
    /*Con la propiedad replace recorremos la variable idInput que acabamos de obtener para que cada vez que encuentre un '_' lo reemplaze por '-' de
      de esta forma ya tenemos el id de el elemento div fecha para poder agregarle las propiedades de DateTimePicker*/
	idAge = idInput.replace(/_/g,'-');


	/*Quitamos la propiedad readonly del input para que pueda ser modificado*/
	$('#'+idInput).removeAttr("readonly");
	/*Agregamos las clases de DateTimePicker para el div fecha*/
	$('#'+idAge).addClass('input-group date age');
	/*Y agregamos la funcionalidad de DateTimePicker sin recargar la pagina de nuevo*/
	$('.age').datetimepicker({
		format: 'L'
	});
}
function formBuscar()
{
	var form = $('#formB');
	$('#busqueda').click(function(){
		if (form.attr('class')=='col-sm-5 hide')
		{
			form.removeClass();
			form.addClass('col-sm-5 animated bounceInUp');
		}
		else
		{
			form.removeClass();
			form.addClass('col-sm-5 hide');
		}
	});
}