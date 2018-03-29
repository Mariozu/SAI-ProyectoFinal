function eproc(){
    alertify.prompt('Renombrar Proceso','','', 
    function(evt,value){
        $.ajax({
            type:"POST",
            url:"herra/editproc.php",
            data:{
                id:$("#idproc").val(),
                name:value
            }
        }).done(function(data){ 
            console.log(data);
            if(data=="1"){
                    $().toastmessage('showSuccessToast', "PROCESO RENOMBRADO CORRECTAMENTE");
                
                setTimeout('document.location.reload()',2000);
            }
            else{
                $().toastmessage('showErrorToast', "A OCURRIDO UN ERROR"); 
    
                setTimeout('document.location.reload()',2000);
            }
        }); 
    },'')       
}
function delproc(){
    alertify.confirm('Advertencia','Esta seguro que desea eliminar este proceso','','').set('onok',
    function(closeEvent){
        $.ajax({
            type:"POST",
            url:"herra/deleteproc.php",
            data:{
                id:$("#idproc").val()
            }
        }).done(function(data){ 
            console.log(data);
            if(data=="1"){
                alertify.notify("Proceso eliminado correctamente");
                setTimeout('document.location.href="menu.php?opc=24"',2000);
            }
            else{
                      $().toastmessage('showErrorToast', "EL PROCESO YA ESTA SIENDO UTILIZADO EN UN PROYECTO Y NO PUEDE SER ELIMINADO"); 
                setTimeout('document.location.reload()',2000);
            }
        });        
    });
}