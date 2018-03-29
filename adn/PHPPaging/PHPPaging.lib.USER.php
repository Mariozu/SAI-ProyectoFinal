<?php
/*******************************************************************
*Proyecto: SAI.
 * 
*Desarrollador: Miguel Martinez.
 * 
*Fecha: 02/05/16.
 * 
*Descripcion: Seccion para acer una tabla para los usuarios
 * 
*Variables Globales: 
 * 
*Metodos: 
*
*******************************************************************/
if(!isset($_SESSION)){ session_start();} 
$sql = "SELECT COUNT(id_emp) FROM usuarios WHERE puesto != 'administrador'";
$query = mysqli_query($con, $sql)  or die("Error: ".mysqli_error($con));
$row = mysqli_fetch_row($query);
// Here we have the total row count
$rows = $row[0];
// This is the number of results we want displayed per page
$page_rows = 10;
// This tells us the page number of our last page
$last = ceil($rows/$page_rows);
// This makes sure $last cannot be less than 1
if($last < 1){
    $last = 1;
}
// Establish the $pagenum variable
$pagenum = 1;
// Get pagenum from URL vars if it is present, else it is = 1
if(isset($_GET['pn'])){
    $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
// This makes sure the page number isn't below 1, or more than our $last page
if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}
// This sets the range of rows to query for the chosen $pagenum
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
// This is your query again, it is for grabbing just one page worth of rows by applying $limit
$sql = "SELECT id_emp,nombre,apellido_pat,apellido_mat,telefono_casa,num_celular,puesto FROM usuarios WHERE puesto != 'administrador' ORDER BY id_emp DESC $limit";
$query = mysqli_query($con, $sql)  or die("Error: ".mysqli_error($con));

// This shows the user what page they are on, and the total number of pages
$text1 = "Usuarios (<b>$rows</b>)&nbsp;&nbsp;";
$text2 = "&nbsp;<b>$pagenum</b> de <b>$last</b><br>";
// Establish the $paginationCtrls variable
$paginationCtrls = '';
// If there is more than 1 page worth of results
if($last != 1){
    /* First we check if we are on page one. If we are then we don't need a link to 
       the previous page or the first page so we do nothing. If we aren't then we
       generate links to the first page, and to the previous page. */
    if ($pagenum > 1) {
        $previous = $pagenum - 1;
        $paginationCtrls .= '<a class = "btn btn-info"  href="'.$_SERVER['PHP_SELF'].'?opc=15&pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
        // Render clickable number links that should appear on the left of the target page number
        for($i = $pagenum-4; $i < $pagenum; $i++){
            if($i > 0){
                $paginationCtrls .= '<a class = "btn btn-info"  href="'.$_SERVER['PHP_SELF'].'?opc=15&pn='.$i.'">'.$i.'</a> &nbsp; ';
            }
        }
    }
    // Render the target page number, but without it being a link
    $paginationCtrls .= ''.$pagenum.' &nbsp; ';
    // Render clickable number links that should appear on the right of the target page number
    for($i = $pagenum+1; $i <= $last; $i++){
        $paginationCtrls .= '<a class = "btn btn-info"  href="'.$_SERVER['PHP_SELF'].'?opc=15&pn='.$i.'">'.$i.'</a> &nbsp; ';
        if($i >= $pagenum+4){
            break;
        }
    }
    // This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a class = "btn btn-info" href="'.$_SERVER['PHP_SELF'].'?opc=15&pn='.$next.'">Next</a> ';
    }
}
$list = '';

?>