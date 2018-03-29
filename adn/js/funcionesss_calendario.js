 function editar(esto){

var nota = esto.id;
console.log(nota);
var not = nota.split("^");
var hor = not[1].split("T");
var fech = hor[0].split("-");
var fecha = fech[2] + "-" + fech[1] + "-" + fech[0];


$('#nota').val(not[0]);
$('#fecha2').val(fecha);
$('#hora2').val(hor[1]);
$('#des2').val(not[2]);



}
function editarAJAX(){

var nota = $('#nota').val();
var fecha = $('#fecha2').val() + "T" + $("#hora2").val();
var des2 = $('#des2').val();
$.ajax({
        data:  {
                title:nota,
                fecha:fecha,
                descripcion:des2
            },
        type: "POST",
        url: 'herramientas/editar_eventos.php',
        success:  function(data) {
        //console.log(data);
        if(data==1){
         $().toastmessage('showSuccessToast', 'EVENTO EDITADO CON ÉXITO!');
         setTimeout('location.reload(true)',1500); 
        }else{
            $().toastmessage('showErrorToast', 'ERROR AL EDITAR EL EVENTO');
        }
    }
    });

}
function confirmar2(esto){
		alertify.confirm("Eliminar","¿Esta seguro de eliminar esta nota?", function(){
			
			$.ajax({
				data:  {id: esto.id},
				type: "POST",
				url: 'herramientas/eliminar_evento.php',
				success:  function(data) {
					if(data==1){
                                            $().toastmessage('showSuccessToast', 'EVENTO ELIMINADO CON EXITO');
                                            setTimeout('location.reload(true)',1500); 
                                        }else{
                                            $().toastmessage('showErrorToast', 'ERROR AL ELIMINAR EL EVENTO');
                                        }
					
				}
			});
			
			
			
			
		},
		function(){
			
			
			//console.log('entre a cancelar');
		});
		
	}