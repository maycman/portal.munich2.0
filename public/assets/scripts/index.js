$(document).ready(function(){

	//Ayuda al navbar a colocar la clase active en el area correspondiente
	classActive();
	
	
	//Coloca la clase primary sobre el boton correcto en encuestas de servicio
	calendarioForms();
	
	
	//Animación para un buscador en el area de 4 semanas
	formBuscar();
	
	
	/*Script que muestra el nombre del archivo que se carga al input
	  para la base de datos de las encuestas de servicio*/
	showNameFile();


	//loading();
});


/************************Funciones******************************/


function classActive()
{
	//Asigna la clase 'active' de bootstrap en la pestaña del menu actual

	//Primero obtenemos la palabra despues de la ultima '/'
	var pag = location.href.substring(location.href.lastIndexOf('/')+1, location.href.lastIndexOf(''));
	//Evaluamos en que pagina estamos
	if (pag=="encuestas" || pag=='encuestas/servicio' || pag=='servicio')
	{
		$('#'+pag).addClass("active");
		$('#mdrop').addClass("active");
		$('#'+'btn-carga').removeClass();
		$('#'+'btn-encuestas').removeClass();
		$('#'+'btn-reportes').removeClass();
		$('#'+'btn-encuestas').addClass('btn btn-primary');
		$('#'+'btn-reportes').addClass('btn btn-default');
		$('#'+'btn-carga').addClass('btn btn-default');
	}
	else if(pag=='carga')
	{
		$('#'+pag).addClass("active");
		$('#mdrop').addClass("active");
		$('#'+'btn-carga').removeClass();
		$('#'+'btn-encuestas').removeClass();
		$('#'+'btn-reportes').removeClass();
		$('#'+'btn-carga').addClass('btn btn-primary');
		$('#'+'btn-reportes').addClass('btn btn-default');
		$('#'+'btn-encuestas').addClass('btn btn-default');
	}
	else if(pag=='4semanas')
	{
		$('#'+pag).addClass("active");
		$('#servicioDrop').addClass("active");
	}
	else if(pag=='reportes')
	{
		$('#'+pag).addClass("active");
		$('#mdrop').addClass("active");
		$('#'+'btn-carga').removeClass();
		$('#'+'btn-encuestas').removeClass();
		$('#'+'btn-reportes').removeClass();
		$('#'+'btn-carga').addClass('btn btn-default');
		$('#'+'btn-reportes').addClass('btn btn-primary');
		$('#'+'btn-encuestas').addClass('btn btn-default');
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
function showNameFile()
{
	try
	{
		document.getElementById('cargaFile').onchange = function ()
		{
  			console.log(this.value);
  			document.getElementById('nombre').innerHTML = document.getElementById('cargaFile').files[0].name;
		}
	}
	catch(err)
	{
		$('#nombre').innerHTML = err.message;
	}
}
function intentos()
{
	/*Esta funcion esconde o muestra la encuesta en el apartado de 
	  CallCenter->Encuestas->encuesta servicio->Iniciar Encuesta*/
	var butt = $('#contactable');
	var form = $('#contacto');
	var razon = $('#noContacto');
	if (butt.prop('checked'))
	{
        /*Este removeClass hace que al darle click muchas veces siempre 
          funcione el checkbox*/
        form.removeClass();
        razon.removeClass();
       	form.addClass('animated rollIn');
       	razon.addClass('animated rollOut');
       	razon.find('input, textarea, button, select').attr('required', false);
       	setTimeout(function(){razon.addClass('hide');}, 500);
    }
    else
    {
        form.removeClass();
        razon.removeClass();
        //Crea una animacion para ocultar la encuesta pero deja un espacio grande
       	form.addClass('animated rollOut');
       	//Muestra un combo con la razón de no contacto
       	razon.addClass('animated rollIn');
       	//Quitamos required de todos los campos del div Preguntas
       	form.find('input, textarea, button, select').attr('required', false);
       	razon.find('input, textarea, button, select').attr('required', true);
       	/*Se agrega una clase despues del tiempo de la animación para 
       	  ocultarla completamente*/
       	setTimeout(function(){form.addClass('hide');}, 500);
    }
}

function aceptaEncuesta()
{
	/*Esta funcion esconde o muestra la encuesta en el apartado de 
	  CallCenter->Encuestas->encuesta servicio->Iniciar Encuesta*/
	var butt = $('#acepta');
	var form = $('#preguntas');
	if (butt.prop('checked'))
	{
        /*Este removeClass hace que al darle click muchas veces siempre 
          funcione el checkbox*/
        form.removeClass();
        //Activamos los campos de la encuesta
        //Activamos required de todos los campos del div Preguntas
       	//form.find('input, textarea, button, select').attr('required', true);
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
       	//O podemos desactivar todo tipo de campo en un formulario buscando
       	//form.find('input, textarea, button, select').attr('disabled', true);
       	//Quitamos required de todos los campos del div Preguntas
       	form.find('input, textarea, button, select').attr('required', false);
       	/*Se agrega una clase despues del tiempo de la animación para 
       	  ocultarla completamente*/
       	setTimeout(function(){form.addClass('hide');}, 500);
    }
}
function llamarLuego()
{
	/*Esta funcion permite ocultar la encuesta y mostrar un input para 
	  reprogramarla de nuevo en la parte de
	  CallCenter->Encuestas->Encuesta Servicio->Iniciar encuesta*/
	var llamar = $('#butonReprograma');
	var encuesta = $('#questions');
	var fecha = $('#agendar');
	var inputFecha = $('#reprograma');
    if (llamar.prop('checked'))
    {
    	/*Estos removeClass hacen que al darle click muchas veces siempre 
    	  funcione el checkbox*/
    	encuesta.removeClass();
    	fecha.removeClass();
    	//Agregamos animación de entrada al input de fecha para reprogramar la encuesta
    	fecha.addClass('form-group animated flipInX');
    	//activamos el campo de reprogramar
    	inputFecha.attr('required',true);
    	//Agregamos animación de salida para el encuesta y poder ocultarla
    	encuesta.addClass('animated zoomOut');
    	//Desactivamos required de todos los campos del div questions
    	encuesta.find('input, textarea, button, select').attr('required', false);
    	//Escondemos realmente la encuesta despues de todas las animaciones
        setTimeout(function(){encuesta.addClass('hide');}, 500);
    }
    else
    {
        encuesta.removeClass();
        fecha.removeClass();
        //Escondemos el input de reprogramar
        fecha.addClass('form-group animated flipOutX');
        //desactivamos required del campo de reprogramar
        inputFecha.attr('required',false);
        //Animamos la entrada de la encuesta
        encuesta.addClass('animated zoomIn');
        //Activamos de nuevo required de los campos de la encuesta
        //encuesta.find('input, textarea, button, select').attr('required', true);
        //escondemos realmente el input de reprogramar
        setTimeout(function(){fecha.addClass('hide');}, 500);
    }
}

/*Todas las funciones con nombre preguntaX ocultan o muestran prenguntas adicionales en la encuesta en
  CallCenter->encuestas->encuesta Servicio->iniciar encuesta*/

function pregunta2()
{
	var select = $("#2");
	var content = $("#p2Negativo");
	if (select.val()<=7)
	{
		content.removeClass();
		content.addClass('animated zoomIn separa');
		content.find('input, textarea, button, select').attr('required', true);
	}
	else
	{
		content.removeClass();
		//content.addClass("animated zoomOut");
		setTimeout(function(){content.addClass('hide');}, 500);
		content.find('input, textarea, button, select').attr('required', false);
	}
}

function pregunta3()
{
	var select = $("#9");
	var content = $("#p3Negativa");
	if (!select.prop('checked'))
	{
		content.removeClass();
		content.addClass('animated zoomIn separa');
	}
	else
	{
		content.removeClass();
		//content.addClass("animated zoomOut");
		setTimeout(function(){content.addClass('hide');}, 500);
		content.find('input, textarea, button, select').attr('required', false);
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
		content.find('input, textarea, button, select').attr('required', true);
	}
	else
	{
		content.removeClass();
		//content.addClass(" row animated zoomOut");
		setTimeout(function(){content.addClass('hide');}, 500);
		content.find('input, textarea, button, select').attr('required', false);
	}
}
function pregunta4()
{
	var select = $('#18');
	var content = $('#p4Negativa');
	if (select.val()<=7)
	{
		content.removeClass();
		content.addClass('animated zoomIn separa');
		content.find('input, textarea, button, select').attr('required', true);
	}
	else
	{
		content.removeClass();
		//content.addClass("animated zoomOut");
		setTimeout(function(){content.addClass('hide');}, 500);
		content.find('input, textarea, button, select').attr('required', false);
	}
}
function pregunta5()
{
	var select = $('#23');
	var content = $('#p5Negativo');
	if (select.val()<=7)
	{
		content.removeClass();
		content.addClass('animated zoomIn separa');
		content.find('input, textarea, button, select').attr('required', true);
	}
	else
	{
		content.removeClass();
		//content.addClass("animated zoomOut");
		setTimeout(function(){content.addClass('hide');}, 500);
		content.find('input, textarea, button, select').attr('required', false);
	}
}



function agregarServicio()
{
	/*Esta función oculta o muestra campos para agregar el servicio desde 
	  que ingresas un nuevo auto en Servicio->4 semanas->nuevo registro*/
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
	/*Esta funcion es para el apartado de Servicio->4 semanas->Agregar servicio
	  para la correcta recolección de las fechas*/

	/*Primero obtenemos el id de la fecha a cambiar ya que el input es readonly 
	  y aun no tiene la propiedad Datetimepicker con la propiedad substring
	  quitamos los primeros 8 caracteres de la variable param para obtener parte 
	  del id correcto algo similar a 'fecha_llegada' este ser el id del input*/
    idInput = param.substring(8);
    /*Con la propiedad replace recorremos la variable idInput que acabamos de 
      obtener para que cada vez que encuentre un '_' lo reemplaze por '-' de
      de esta forma ya tenemos el id de el elemento div fecha para poder agregarle 
      las propiedades de DateTimePicker*/
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
function Reportes rangoOpen()
{
	var open = $('#rango');
	open.click(function(){
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