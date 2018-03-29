<?php 

/*******************************************************************
*Proyecto: SAI.
 * 
*Desarrollador: Miguel Martinez.
 * 
*Fecha: 29/04/16.
 * 
*Descripcion: Seccion para menu del Gerente
 * 
*Variables Globales: 
 * 
*Metodos: 
*
*******************************************************************/
if(isset($_SESSION['Activa_server'])){
       header('location: adn/');
    }else{
        header('location: version2/');
    }
