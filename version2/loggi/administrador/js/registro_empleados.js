
function generate_random() 
{
    var x = document.getElementById("demo")
    x.innerHTML = Math.floor((Math.random() * 1000000) + 1);
	
	$("#pass1").val(x.innerHTML); 
	
	
}

function alta_empleado()
{
	
	
	if($.trim($('#nombre').val()).length && $.trim($('#ap_pat').val()).length && $.trim($('#ap_mat').val()).length && $.trim($('#cargo').val()).length && $.trim($('#empresa').val()).length && $.trim($('#dep').val()).length && $.trim($('#email').val()).length && $.trim($('#pass1').val()).length && $.trim($('#cel').val()).length)
	{
		
		$.ajax({
			type: "POST",
			url: "funciones/funcion_registrar_empleado.php",
			data: {
				nombre: $("#nombre").val(),
				apellidop: $("#ap_pat").val(),
				apellidom: $("#ap_mat").val(),				
				cargo: $("#cargo").val(),
				dep: $("#dep").val(),
				turno:$("#turno").val(),
				calle: $("#calle").val(),					
				colonia: $("#colonia").val(),
				cp: $("#cp").val(),
				email: $("#email").val(),
				cel: $("#cel").val(),										
				clave:$("#pass1").val(),
				empresa:$("#empresa").val()
			}
		}).done(function(response)
		{
			if(response==1)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.success('El empleado ha sido agregado con exito');
				setTimeout('location.reload(true)',1500);
			}
			else{
				console.log("error");
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.error('Estamos presentando dificultades');
			}			
		});		
	}
	else
	{
		
		console.log("error");
		toastr.options.progressBar = true;
		toastr.options.positionClass = 'toast-top-right';
		toastr.error('Algunos campos importantes deben ser llenados');
		
	}
	
}	

function edita_empleado()
{
	if($("#cargo").val()=='administrador')
	{
		toastr.options.progressBar = true;
		toastr.options.positionClass = 'toast-top-right';
		toastr.error('Un administrador solo puede ser dado de alta desde TIMSUP');
	}
	else
	{
		if($.trim($('#nombre').val()).length && $.trim($('#ap_pat').val()).length && $.trim($('#ap_mat').val()).length && $.trim($('#cargo').val()).length && $.trim($('#empresa').val()).length && $.trim($('#dep').val()).length && $.trim($('#email').val()).length && $.trim($('#pass1').val()).length && $.trim($('#cel').val()).length)
		{
			
			$.ajax({
				type: "POST",
				url: "funciones/funcion_editar_empleado.php",
				data: {
					nombre: $("#nombre").val(),
					apellidop: $("#ap_pat").val(),
					apellidom: $("#ap_mat").val(),				
					cargo: $("#cargo").val(),
					dep: $("#dep").val(),
					turno:$("#turno").val(),
					calle: $("#calle").val(),					
					colonia: $("#colonia").val(),
					cp: $("#cp").val(),
					email: $("#email").val(),
					cel: $("#cel").val(),										
					clave:$("#pass1").val(),
					empresa:$("#empresa").val(),
					entrada:$("#h_entrada").val(),
					salida:$("#h_salida").val(),
					h_e_comer:$("#h_e_comer").val(),
					h_s_comer:$("#h_s_comer").val(),
					id_empleado:$("#empleado").val()
				}
			}).done(function(response)
			{
				if(response==1)
				{
					toastr.options.progressBar = true;
					toastr.options.positionClass = 'toast-top-right';
					toastr.success('Haz editado con exito!');
					setTimeout('location.reload(true)',1500);
				}
				else
				{
					console.log("error");
					toastr.options.progressBar = true;
					toastr.options.positionClass = 'toast-top-right';
					toastr.error('Estamos presentando dificultades');
				}			
			});	
		}
		else
		{
			
			console.log("error");
			toastr.options.progressBar = true;
			toastr.options.positionClass = 'toast-top-right';
			toastr.error('Algunos campos importantes son requeridos');
			
		}
	}
}
$(document).ready(function()
{
	$('#hourcontainer').hide();
	$('#gpo_hr').hide();
	$('#hoursongroup').hide();
});
function changemode(x)
{
	console.log(x);
	switch(x)
	{
		case "0":
		$('#hourcontainer').fadeIn("slow");
		$('#gpo_hr').hide();
		$('#hoursongroup').hide();
		$( "#optionsgruop" ).prop( "checked", false );
		break;
		case "1":
		$('#gpo_hr').fadeIn("slow");
		$('#hourcontainer').hide();
		$( "#optionsmanual" ).prop( "checked", false );
		break;
	}
}
function select_gpo()
{
	$('#hoursongroup').fadeIn("slow");
	clear_inputs_gpo();
	$.ajax({
		type: "POST",
		url: "funciones/devolver_horarios.php",
		data: {
			id_grupo: $("#grupo").val()	
		}
	}).done(function(data)
	{
		datos=JSON.parse(data);
		//console.log(datos[0]);		
		$("#gpo_entrada").val(datos[0][0]);
		$("#gpo_salida").val(datos[0][1]);
		$("#gpo_comer").val(datos[0][2]);
		$("#gpo_s_comer").val(datos[0][3]);
	});
}
function clear_inputs_gpo()
{
	$("#gpo_entrada").val('');
	$("#gpo_salida").val('');
	$("#gpo_comer").val('');
	$("#gpo_s_comer").val('');
}