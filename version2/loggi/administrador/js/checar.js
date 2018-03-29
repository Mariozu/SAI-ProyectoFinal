/*******************************************************************
	*Proyecto: SAI.
	* 
	*Desarrollador: Miguel Martinez.
	* 
	*Fecha: 03/05/16.
	* 
	*Descripcion: funcionalidad del checador
	* 
	*Variables Globales: 
	* 
	*Metodos: 
	*
*******************************************************************/
function checador(){
    if($.trim($("#contra").val())){
        console.log($("#contra").val());
        $.ajax({
            type:"POST",
            url:"funciones/marcar_entrada.php",
            data:{
                contra:$("#contra").val(),
                hora:$("#liveclock3").val()
			}
			}).done(function(data){ 
            console.log(data);
            if(data==0)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.error('Introdusca su clave correctamente');
				
			}
            if(data==1)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.success('Entrada registrada correctamente, Bienvenido');
				
                setTimeout('document.location.reload()',2000);
			}
            if(data==2)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.success('Salida registrada correctamente, Que tenga un buen dia');
                
                setTimeout('document.location.reload()',2000);
			}
            if(data==3)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.warning('Salida a horario de comida, Buen Provecho');
				
                setTimeout('document.location.reload()',2000);
			}
            if(data==4)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.warning('Entrada de horario de comida, Bienvenido de Regreso');
				
                setTimeout('document.location.reload()',2000);
			}
			if(data==7)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.error('Aun no es su hora de salida'); 
				
			}
			if(data==8)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.error('Ya haz marcado salida'); 
                
			}
            if(data==9)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.error('Aun no es su hora de comida'); 
                
			}
            if(data==10)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.error('Ha ocurrido un error'); 
				
			}
			if(data==666)
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.error('No tienes horario de trabajo registrado , comunicate con tu administrador'); 
				
			}
			if(data =="over9000")
			{
				toastr.options.progressBar = true;
				toastr.options.positionClass = 'toast-top-right';
				toastr.error('Ya ha finalizado tu dia de trabajo no puedes marcar salida'); 
			}
		});
	}else
	{
		toastr.options.progressBar = true;
		toastr.options.positionClass = 'toast-top-right';
		toastr.error('Introduzca su clave'); 
		
	}
}

function show_event(titulo,admin,mensaje,fecha)
{
	console.log(mensaje);
	$('#modal-evento').modal({backdrop: 'static', keyboard: false});
	$('#event_desc').text(mensaje);
	$('#adm-event').text(admin);
	$('#event_title').text(titulo);
	$('#event-fecha').text(fecha);
}
function editar(id)
{
	console.log(id);
	location.href = "?opc=6&ver="+id;
}
function perfil_empleado(id_emp)
{
	location.href = "?opc=8&ver="+id_emp;
}
function config()
{
	
	location.href = "?opc=7";
}
function logout()
{
	$('#logout').modal({backdrop: 'static', keyboard: false});
}