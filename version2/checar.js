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
            if(data==0){
                $().toastmessage('showErrorToast', "Introdusca su clave correctamente"); 
            }
            if(data==1){
                $().toastmessage('showSuccessToast', "Entrada registrada correctamente, Bienvenido");
                setTimeout('document.location.reload()',2000);
            }
            if(data==2){
                $().toastmessage('showSuccessToast', "Salida registrada correctamente, Que tenga un buen dia");
                setTimeout('document.location.reload()',2000);
            }
            if(data==3){
                $().toastmessage('showSuccessToast', "Salida a horario de comida, Buen Provecho");
                setTimeout('document.location.reload()',2000);
            }
            if(data==4){
                $().toastmessage('showSuccessToast', "Entrada de horario de comida, Bienvenido de Regreso");
                setTimeout('document.location.reload()',2000);
            }
             if(data==7){
                $().toastmessage('showErrorToast', "Aun no es su hora de salida"); 
            }
             if(data==8){
                $().toastmessage('showErrorToast', "Ya marco salida"); 
            }
            if(data==9){
                $().toastmessage('showErrorToast', "Aun no es su hora de comida"); 
            }
            if(data==10){
                $().toastmessage('showErrorToast', "Ha ocurrido un error"); 
            }
        });
    }else{
        $().toastmessage('showErrorToast', "Introdusca Su clave"); 
    }
}