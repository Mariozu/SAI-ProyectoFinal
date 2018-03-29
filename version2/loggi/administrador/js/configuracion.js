$(document).ready(function()
{
	$("#perfil")[0].style.color="rgb(239, 95, 89)";
	console.log($("#perfil")[0].style.color);
	$("#panel_horario").hide();
	$("#panel_grupo_horario").hide();
	$('#panel_configuracion_horario').hide();
});

function show_panel(x)
{
	console.log(x);
	switch(x)
	{
		case 0:
		$("#perfil")[0].style.color="rgb(239, 95, 89)";
		$('#panel_personal').fadeIn("slow");
		$('#panel_horario').hide();
		$('#panel_grupo_horario').hide();
		$('#panel_configuracion_horario').hide();
		$("#hora")[0].style.color="#000";
		$("#c_h")[0].style.color="#000";
		$("#config_hrs")[0].style.color="#000";
		break;
		
		case 1:
		$("#hora")[0].style.color="rgb(239, 95, 89)";		
		$('#panel_horario').fadeIn("slow");
		$('#panel_personal').hide();
		$('#panel_grupo_horario').hide();
		$('#panel_configuracion_horario').hide();
		$("#perfil")[0].style.color="#000";
		$("#c_h")[0].style.color="#000";
		$("#config_hrs")[0].style.color="#000";
		break;
		case 2:
		$("#c_h")[0].style.color="rgb(239, 95, 89)";
		$('#panel_grupo_horario').fadeIn("slow");
		$('#panel_personal').hide();
		$('#panel_horario').hide();
		$('#panel_configuracion_horario').hide();
		$("#hora")[0].style.color="#000";
		$("#perfil")[0].style.color="#000";
		$("#config_hrs")[0].style.color="#000";
		break;
		case 3:
		$('#panel_configuracion_horario').fadeIn("slow");
		$('#panel_grupo_horario').hide();
		$('#panel_horario').hide();
		$("#hora")[0].style.color="#000";
		$("#perfil")[0].style.color="#000";
		$("#c_h")[0].style.color="#000";
		$("#config_hrs")[0].style.color="rgb(239, 95, 89)";
		$('#panel_personal').hide();
		break;
		
	}
}
function select_gpo()
{
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

function save_changes(type)
{
	switch(type)
	{
		case "personal":
		if($.trim($('#nombre').val()).length && $.trim($('#ap_pat').val()).length && $.trim($('#ap_mat').val()).length  && $.trim($('#email').val()).length && $.trim($('#pass1').val()).length && $.trim($('#cel').val()).length)
		{
			console.log(type);
			$.ajax({
				type: "POST",
				url: "funciones/funcion_editar_datos_personales.php",
				data: {
					nombre: $("#nombre").val(),
					apellidop: $("#ap_pat").val(),
					apellidom: $("#ap_mat").val(),				
					
					email: $("#email").val(),
					cel: $("#cel").val(),										
					clave:$("#pass1").val(),	
					
				}
			}).done(function(response)
			{
				if(response==1)
				{
					toastr.options.progressBar = true;
					toastr.options.positionClass = 'toast-top-right';
					toastr.success('Haz editado tu perfil con exito!');
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
			toastr.error('Recuerda que todos los campos deben estar completos');
			
		}
		break;
		case "horario_personal":
		$.ajax({
			type: "POST",
			url: "funciones/funcion_editar_horarios_personales.php",
			data: {
				entrada:$("#h_entrada").val(),
				salida:$("#h_salida").val(),
				h_e_comer:$("#h_e_comer").val(),
				h_s_comer:$("#h_s_comer").val()	
				
			}
		}).done(function(response)
		{
			if(response==1)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.success('Haz editado tu horario con exito!');
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
		break;
		case "grupo_horario":
		$.ajax({
			type: "POST",
			url: "funciones/funcion_agregar_grupo_horarios.php",
			data: {
				etiqueta:$("#etiqueta").val(),
				entrada:$("#h_g_entrada").val(),
				salida:$("#h_g_salida").val(),
				h_e_comer:$("#h_e_g_comer").val(),
				h_s_comer:$("#h_s_g_comer").val()	
				
			}
		}).done(function(response)
		{
			if(response==1)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.success('Haz agregado tu grupo de horario con exito!');
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
		break;
		case "editar_horario":
		$.ajax({
			type: "POST",
			url: "funciones/funcion_editar_grupo_horarios.php",
			data: {
				id_grupo:$("#grupo").val(),
				entrada:$("#gpo_entrada").val(),
				salida:$("#gpo_salida").val(),
				h_e_comer:$("#gpo_comer").val(),
				h_s_comer:$("#gpo_s_comer").val()	
				
			}
		}).done(function(response)
		{
			if(response==1)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.success('Haz editado tu grupo de horario con exito!');
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
		break;
		
	}
}

$(function () {
	$('#h_e_comer').datetimepicker({
		format: 'HH:mm:ss'
	});
	$('#h_s_comer').datetimepicker({
		format: 'HH:mm:ss'
	});
	$('#h_entrada').datetimepicker({
		format: 'HH:mm:ss'
	});
	$('#h_salida').datetimepicker({
		format: 'HH:mm:ss'
		});
		
		$('#h_e_g_comer').datetimepicker({
			format: 'HH:mm:ss'
		});
		$('#h_s_g_comer').datetimepicker({
			format: 'HH:mm:ss'
		});
		$('#h_g_entrada').datetimepicker({
			format: 'HH:mm:ss'
		});
		$('#h_g_salida').datetimepicker({
			format: 'HH:mm:ss'
		});
		
		$('#gpo_comer').datetimepicker({
			format: 'HH:mm:ss'
		});
		$('#gpo_s_comer').datetimepicker({
			format: 'HH:mm:ss'
		});
		$('#gpo_entrada').datetimepicker({
			format: 'HH:mm:ss'
		});
		$('#gpo_salida').datetimepicker({
			format: 'HH:mm:ss'
		});
	});
	
	
