<?php 
/*******************************************************************
*Proyecto: SAI.
 * 
*Desarrollador: Miguel Martinez.
 * 
*Fecha: 02/05/16.
 * 
*Descripcion: Seccion para mostrar la tabla de usuarios
 * 
*Variables Globales: 
 * 
*Metodos: 
*
*******************************************************************/
if(!isset($_SESSION)){ session_start();} 
require("../conexion.php");
?>
<link rel="stylesheet" href="css/modalbox.css" type='text/css'/>
<script type="text/javascript">
function mostrarReferencia(){
    var hi = confirm("¿Estas seguro de Eliminar este desarrollador?");
    if (hi== true){
        window.location.replace("menu.php");       
    }else{
        var href = $("#delete").attr('href');
        alert(""+href);
    }
}
</script>
<div style = "">
         <a href= "dompdf/users.php" ><i class="fa fa-file-pdf-o fa-3x"></i>&nbsp;&nbsp;Pasar a PDF</a>
</div>
<div style = "width:900px; heigth:500px; margin-top:50px; margin-left:300px;" >
    <div  id="desdeotro" style = "display:none; margin-top:-45px; margin-left:20px;" >
        <input type = "button" style = "margin-top:20px;" onclick="EliminarUser();" class = "btn-style" value = "Eliminar"> 
    </div>
    <div   class = "row" style = "margin-left:-100px;">
        <table class = "table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Cargo</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    include("PHPPaging/PHPPaging.lib.USER.php");
                    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                        echo "<tr>\n";
                        echo "<td class = 'success'><a href = '?opc=16&id=".$row["id_emp"]."'>".$row["nombre"]."</a></td> ";
                        echo "<td class='success'> ".$row["apellido_pat"]."</td><td class='success'>".$row["apellido_mat"]."</td><td class='success'>".$row["puesto"]."</td></td><td class='success'>".$row["telefono_casa"]."</td></td><td class='success'>".$row["num_celular"]."</td>";
                        echo "<td class = 'success'><a href='#' name='eliminar' id='".$row['id_emp']."' onclick='confirmar2(this)'><i class=\"fa fa-trash-o fa-2x\" id=\"Conocido_0\" ></i></a></td>";
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div style = "margin-left:350px;">
    <?php
    echo "".$text1." ";
    echo "".$text2."";
    echo "<div class = 'pagination_controls' >".$paginationCtrls."</div>";
    ?>
</div>



 <script>
            function confirmar2(esto){
          

alertify.confirm("Eliminar","¿Esta seguro de eliminar este empleado?", function(){
  
$.ajax({
        data:  {id: esto.id},
        type: "POST",
        url: 'herramientas/eliminar_usuario.php',
        success:  function(data) {
        //console.log(data);
        $().toastmessage('showSuccessToast','USUARIO ELIMINADO!');
        setTimeout('location.reload(true)',2000); 
        }
    });


//console.log('entre aqui');

  },
  function(){


//console.log('entre a cancelar');
  });

          }
        </script>   
