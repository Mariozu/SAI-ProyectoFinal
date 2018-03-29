function nepro(){



//        console.log($('#desarrollador_asig').val());
	 if($.trim($("#lider").val()).length && $.trim($("#proyectoC").val()).length && $.trim($("#desc").val()).length&& $.trim($("#Fecha_inicial").val()).length&& $.trim($("#Fecha_final").val()).length&& $.trim($("#proc").val()).length)
	 {
	$.ajax({
		type:"POST",
		url:"Addwork.php",
		data:{
                  proyecto: $("#proyectoC").val(),
                  descripcion: $("#desc").val(),
                  fechain: $("#Fecha_inicial").val(),
                  fechafin: $("#Fecha_final").val(),
                  proceso: $("#proc").val(),
                  lider:   $("#lider").val()
		}
	}).done(function(data){
		console.log(data);	


        if(data == 2){

        $('#div1').fadeIn().html('<h5>LA FECHA INICIAL NO TIENE QUE SER MAYOR A LA FECHA FINAL!</h5>'); 
      setTimeout('$("#div1").fadeOut()',2000); 
         }
        
         if(data == 1){

		  $('#div2').fadeIn().html('<h3 style = "color:green">PROYECTO CREADO CON ÉXITO</h3>'); 

                  $("#proyectoC").val("");
                  $("#desc").val("");
                  $("#Fecha_inicial").val("");
                  $("#Fecha_final").val("");
                  $("#proc").val("");


            setTimeout('$("#div2").fadeOut(); document.location.reload()',2000); 



        }

        if(data == 0){

 		$('#div2').fadeIn().html('<h5 style = "color:red">ERROR AL CREAR PROYECTO</h5>'); 
 	    setTimeout('$("#div2").fadeOut()',2000);

        }
         if(data == 3){

    $('#div2').fadeIn().html('<h5 style = "color:red">PROYECTO YA REGISTRADO</h5>'); 
      setTimeout('$("#div2").fadeOut()',2000);

        }
	});}
   else
	 {
		  $('#div2').fadeIn().html('<h5 style = "color:red">DATOS INCOMPLETOS</h5>'); 
          setTimeout('$("#div2").fadeOut()',2000); console.log($("#proyectoC").val()+": Valor");
	 }

}
function memo(){
    if($.trim($("#titulo").val()).length && $.trim($("#mensaje").val()).length){
        $.ajax({
            type:"POST",
            url:"herra/guardar_memo.php",
            data:{
                titulo: $("#titulo").val(),
                mensaje: $("#mensaje").val(),
                prio: $("#prio").val(),
//                masivo: $("#masivo").val(),
                emp: $("#emp").val()
            }
        }).done(function(data){
            console.log(data);
     
            if(data==1){
               $().toastmessage('showSuccessToast',"MEMO ENVIADO CON EXITO CON ÉXITO!");  
                setTimeout('document.location.href="menu.php?opc=15"',2000);
            }else{
              $().toastmessage('showErrorToast', "OCURRIO UN ERROR");
        
                //setTimeout('document.location.href="menu.php?opc=15"',2000);
            }
        })
    }
}
function eliminar_memo(dato){
console.log("dato"+dato);
$.ajax({
		type: "POST",
		url:"herra/eliminar_memo.php",
		data :{
			nota:dato
		}
	}).done(function(){ 
	
        $().toastmessage('showSuccessToast',"MEMO ELIMINADO CORRECTAMENTE");  
        setTimeout('document.location.reload()',2000);
    });
}

function delete_bitacora(dato)
{
console.log("dato"+dato);
$.ajax({
    type: "POST",
    url:"defile.php",
    data :{
      id:dato
    }
  }).done(function(){ 

            $().toastmessage('showSuccessToast',"DOCUMENTO ELIMINADO CON EXITO");

            setTimeout('document.location.reload()',2000);
    });
}