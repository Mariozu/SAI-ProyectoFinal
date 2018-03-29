<meta charset="UTF-8"/>
<?php
include("conexion_pixki.php");
//recibe el valor de estado 
$estado = $_GET['nom_estado'];

$consulta = mysqli_query($con,"select nombre from municipios where nom_estado='$estado'");
while ($fila = mysqli_fetch_array($consulta)) {  
    //muestra los municipios
    echo "<option >".$fila["nombre"]."</option>";  //muestra los municipios
}
?>