function login()
{
	$.ajax({
		type: "POST",
		url: "funciones/funcion_validacion.php",
		data:{
			aceptar: "",
			email: $("#email").val(),
			contrasena: $("#contrasena").val()
		}
		}).done(function(response){
		if(response == 0){  
			
			toastr.options.progressBar = true;
			toastr.options.positionClass = 'toast-top-right';
			toastr.error('Ususario o Contraseña incorrecta por favor intentelo de nuevo');
			
			}else if(response == 1 ){
			window.location.replace("administrador/index.php");												 
		}
	});
}