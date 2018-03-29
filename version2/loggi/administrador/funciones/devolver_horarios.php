<?php
	require("../conexion.php");	
	$grupo= $_POST["id_grupo"]; 
	
	$seleccionar_grupo=" SELECT entrada,salida,entrada_comer,regreso_comer FROM grupo_horarios WHERE id_grupo='".$grupo."'";
	$resultado=mysqli_query($con,$seleccionar_grupo);
	$gpo = [];//creamos un arreglo 
    		$i = 0;// y un contador 
    		while($reg = mysqli_fetch_assoc($resultado))
			{
				$gpo[$i][] = $reg["entrada"];
                $gpo[$i][] = $reg["salida"];
                $gpo[$i][] = $reg["entrada_comer"];
                $gpo[$i][] = $reg["regreso_comer"];
				$i++;//aumentamos el contador en unp
			}
			echo json_encode($gpo);
	
?>