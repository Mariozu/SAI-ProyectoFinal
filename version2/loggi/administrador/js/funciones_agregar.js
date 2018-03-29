function subir_evento()
{
	if($.trim($('#titulo_publicasion').val()).length && $.trim($('#desc_publicasion').val()).length && $.trim($('#fech2').val()).length )
	{   
		$.ajax({
			type: "POST",
			url: "funciones/publicar_evento.php",
			data: {
				titulo: $("#titulo_publicasion").val(),
				descripcion: $("#desc_publicasion").val(),
				fecha: $("#fech2").val()
			}
		}).done(function(response)
		{
		
			if(response==1)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.success('Tu eventoo ha sido publicado con exito');
				setTimeout('location.reload(true)',1500);
			}
			else{
				
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.error('Error fatal ');
			}			
		});
	}
	else
	{
		
		toastr.options.progressBar = true;
		toastr.options.positionClass = 'toast-top-right';
		toastr.error('La publicasion no debe contener ningun campo vacio ');
	}
}