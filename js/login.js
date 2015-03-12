
/*
* reservas
*
* javascript en donde se realiza el manejo las acciones y eventos del formuulario con jquery
* @author	Christian David Criollo <cdcriollo@icesi.edu.co>
* @since	2014-06-03
*/

// Inicialización de jquery
$(function(){ 

 /*$("#div_borowser").hide();
 
   if ($.browser.msie) 
   { //internet explorer
		var version = parseInt($.browser.version);
		if (version == 8 || version==7) 
		{
		   $("#div_borowser").show();
		}
   }*/


// Configuracion de nensajes jquery validator
  $.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
});

 var bodyHeight = $("body").height();
 var vwptHeight = $(window).height();
 
  if (vwptHeight > bodyHeight) {
    $("footer#colophon").css("position","absolute").css("bottom",0);
  }

// Asignación de reglas de validación validate
$("#formlogin" ).validate({
      rules: {
       cedula: {
         required: true,
     },
	 
	  password: {
         required: true,
      }
  }
});

// Configuracion de los mensajes
function mostrarDialogo(mensaje, titulo, ancho, alto, tipo){
		
	  $("#text-message").html(mensaje);
	  $('#dialog-icon').removeClass();
	  $('#dialog-icon').addClass('ui-icon');
	  switch(tipo){
		case 1:
		  clase = 'ui-state-default';
		  $('#dialog-icon').addClass('ui-icon-info');
		  break;
		case 2:
		  clase = 'ui-state-active';
		  $('#dialog-icon').addClass('ui-icon-alert');
		  break;
		case 3:
		  clase = 'ui-state-error';
		  $('#dialog-icon').addClass('ui-icon-circle-close');
		  break;
		case 4:
		  clase = 'ui-state-default';
		  $('#dialog-icon').addClass('ui-icon-circle-check');
		  break;
		default:
		  clase = 'ui-state-default';
		   $('#dialog-icon').addClass('ui-icon-notice');
		  break;
	  }
	  
	  $( "#dialog-message" ).dialog({
		modal: true,
		buttons: {
		  "Aceptar": function() {
			$( this ).dialog( "close" );
		  }
		},
		title: titulo,
		closeOnEscape: true,
		draggable: false,
		resizable: false,
		show: 'fade',
		hide: 'fade',
		width: ancho,
		minHeight: alto,
		dialogClass: clase
	  })
  }
  
  // Función que se encarga de realizar la validacion del usuario en el directorio activo
  function loginusuario()
  {
	  // Se hace una llamada ajax a la url especificada
	 
	 var validacion= $("#formlogin").valid();
	 
	 var data = {
		'cedula': $("#cedula").val(),
		'password': $("#password").val() 
	 }
	 
	 if(validacion)
	 {
		 
	   $("#cedula").removeClass('error');
	   $("#password").removeClass('error');	 
	 
	   $.ajax({
	   
	   url: 'view/loginuser.php',
	   data: data,
	   type: 'post',
	   dataType:"json",//html
	   success: function(response) {
		
		switch(response.error)
		{
			case 1:
                           //$('#div').html(response);
			//$(location).attr('href','view/reservas.php');
			$(location).attr('href','view/bloq_user_joomla.php');
			break;
			
			
			case 0:
			var mensaje= "Cédula o contraseña errónea"; 
			var titulo= "Datos Incorrectos";
			var ancho= 350;
			var alto=40;
			var tipo= 3;
			mostrarDialogo(mensaje, titulo, ancho, alto, tipo);
			break;	
		}
	    
		 
	   },
	   error: function(xhr, ajaxOptions, thrownError) {
	 }
    });
   } 
  }// cierra función
  
  //Realiza la validación del usuario en el directorio activo al presionar la tecla enter
  $("#password").keydown(function(event) {
	  
	 if (event.keyCode == '13') 
	 {
	    event.preventDefault();
		
		if($("#formlogin").valid())  
		{
		    if($("#cedula").val().length > 0 && $("#password").val().length > 0)
			{	
			  loginusuario();
			}
			else
			{
			  var mensaje= "Los campos Cedula y Contraseña no pueden estar vacios"; 
			  var titulo= "Datos vacios";
			  var ancho= 300;
			  var alto=40;
			  var tipo= 3;
			  mostrarDialogo(mensaje, titulo, ancho, alto, tipo);  
		   }
		}
    } 
  });

  $('#button-login').click(function() {
	    
   if($("#formlogin").valid())	
   {  
	   if($("#cedula").val().length > 0 && $("#password").val().length > 0)
	   {	  
		 loginusuario();
	   }
	   else
	   {
		  var mensaje= "Los campos Cedula y Contraseña no pueden estar vacios"; 
		  var titulo= "Datos vacios";
		  var ancho= 300;
		  var alto=40;
		  var tipo= 3;
		  mostrarDialogo(mensaje, titulo, ancho, alto, tipo);  
	   }
   }
 });
}); // cieera jquery