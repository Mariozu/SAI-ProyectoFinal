function send_mail()
{
	if($('#si_enviar').is(":checked"))
	{
		if($.trim($("#asunto_mensaje").val()).length && $.trim($("#mensaje_sai").val()).length)
		{
			$.ajax({
				type:"POST",
				url:"funciones/enviar_contacto_pixki.php",
				
				data:{
					
					asunto:$('#asunto_mensaje').val(),
					mensaje:$('#mensaje_sai').val()
				}
				}).done(function(data){
				if(data =="1")
				{
					toastr.options.progressBar = true;
					toastr.options.positionClass = 'toast-top-right';
					toastr.success('Correo enviado con exito');
					
					
				}
				else
				{
					$().toastmessage('showErrorToast', "ERROR");
				}
			});
			
		}
		else
		{
			toastr.options.progressBar = true;
			toastr.options.positionClass = 'toast-top-right';
			toastr.error('Por favor revise que todos los campos esten completos');
			
		}
	}
	else
	{
		toastr.options.progressBar = true;
		toastr.options.positionClass = 'toast-top-right';
		toastr.error('Por favor seleccione "si enviar el mensaje"');
	}
}