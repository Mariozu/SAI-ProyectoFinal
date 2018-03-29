   function hide(){
                        $("#hide").hide();
                    }
                    function show(){
                        $("#hide").show();
                    }
                   

                    function click2(){
                        var hora = $("#hora").val();
                        var evento = $("#evento").val();
                        var des = $("#des").val();
                        var fch = $("#fecha").val();
                        if(evento == "" || des == "" || hora == ""){
                                         $().toastmessage('showErrorToast', "HAY ESPACIOS VACIOS!");
                       
                        }else{

                        

                            $.ajax({
                                type: "POST",
                                url: "herramientas/agregar_evento.php",
                                data: {
                                    evento:$("#evento").val(),
                                    usuario:$("#usuarios").val(),
                                    hora:$("#hora").val(),
                                    descripcion: des,
                                    fecha:$("#fecha").val(),
                                },
                                success: function(data) {
                                    $('#Info').fadeIn(1).html(data);
                                  
                                  $().toastmessage('showSuccessToast', "EVENTO AGREGADO CON EXITO");
 
                                 setTimeout('location.reload(true)',2000); 
                                }
                            });
                        }
                    }


                    function Eventpriv(){
                        var hora = $("#hora").val();
                        var evento = $("#evento").val();
                        var des = $("#des").val();
                        
                        if(evento == "" || des == "" || hora == ""){

                                   $().toastmessage('showErrorToast', "HAY ESPACIOS VACIOS!");
                        }else{

                        

                            $.ajax({
                                type: "POST",
                                url: "herramientas/agregar_evento_priv.php",
                                data: {
                                    evento:$("#evento").val(),
                                    hora:$("#hora").val(),
                                    descripcion: des,
                                    fecha:$("#fecha").val(),
                                },
                                success: function(data) {
                                    $('#Info').fadeIn(1).html(data);
                                    if(data==1){
                                        $().toastmessage('showSuccessToast', "EVENTO AGREGADO CON EXITO");
                                        setTimeout('location.reload(true)',2000); 
                                    }else{
                                        $().toastmessage('showErrorToast', "ERROR AL AGREGAR EVENTO");
                                    }
                                }
                            });
                        }
                    }




                    function Eventjunta(){

                          var hora = $("#hora").val();
                        var evento = $("#evento").val();
                        var des = $("#des").val();
                       
                        if(evento == "" || des == "" || hora == ""){

                            $().toastmessage('showErrorToast', "HAY ESPACIOS VACIOS!");
                        }else{

                        
                            
                            $.ajax({
                                type: "POST",
                                url: "herramientas/agregar_evento_junta.php",
                                data: {
                                    evento:$("#evento").val(),
                                    proyecto:$("#proyect").val(),
                                    hora:$("#hora").val(),
                                    descripcion: des,
                                    fecha:$("#fecha").val(),
                                },
                                success: function(data) {
                                    $('#Info').fadeIn(1).html(data);
                                  
                                     $().toastmessage('showSuccessToast', "EVENTO AGREGADO CON EXITO");
                                 setTimeout('location.reload(true)',2000); 
                                }
                            });
                        }


                    }

                    