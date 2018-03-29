<?php
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_REQUEST["buscar"])){
    $fecha1=$_REQUEST["fecha1"];
    $fecha2=$_REQUEST["fecha2"];
    $sql = "SELECT COUNT(id_entrada) FROM checador JOIN usuarios WHERE fecha>='$fecha1' AND fecha<='$fecha2' AND id_user='$id' AND id_emp='$id'";
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
    $sql = "SELECT fecha,hora_entrada,hora_comida,hora_regreso,hora_salida,id_emp,nombre,apellido_pat,apellido_mat,turno FROM checador JOIN usuarios WHERE fecha>='$fecha1' AND fecha<='$fecha2' AND id_user='$id' AND id_emp='$id' ORDER BY id_entrada DESC $limit";
    $query = mysqli_query($con, $sql)  or die("Error: ".mysqli_error($con));; 
    // This shows the user what page they are on, and the total number of pages
    $text1 = "Registros (<b>$rows</b>)&nbsp;&nbsp;";
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
            $paginationCtrls .= '<a class = "btn btn-info"  href="'.$_SERVER['PHP_SELF'].'?opc=1&pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
            // Render clickable number links that should appear on the left of the target page number
            for($i = $pagenum-4; $i < $pagenum; $i++){
                if($i > 0){
                    $paginationCtrls .= '<a class = "btn btn-info"  href="'.$_SERVER['PHP_SELF'].'?opc=1&pn='.$i.'">'.$i.'</a> &nbsp; ';
                }
            }
        }
        // Render the target page number, but without it being a link
        $paginationCtrls .= ''.$pagenum.' &nbsp; ';
        // Render clickable number links that should appear on the right of the target page number
        for($i = $pagenum+1; $i <= $last; $i++){
            $paginationCtrls .= '<a class = "btn btn-info"  href="'.$_SERVER['PHP_SELF'].'?opc=1&pn='.$i.'">'.$i.'</a> &nbsp; ';
            if($i >= $pagenum+4){
                break;
            }
        }
        // This does the same as above, only checking if we are on the last page, and then generating the "Next"
        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $paginationCtrls .= ' &nbsp; &nbsp; <a class = "btn btn-info" href="'.$_SERVER['PHP_SELF'].'?opc=1&pn='.$next.'">Next</a> ';
        }
    }
    $list = '';
     while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                        $entrada="08:00:00";
                        $comida="14:00:00";
                        $regreso="15:00:00";
                        $salida="17:00:00";
                        echo "<tr>\n";
                        echo "<td class = 'success'><a href = '?opc=3&id=".$row["id_emp"]."'>".$row["nombre"]."</a></td> ";
                        echo "<td class='success'> ".$row["apellido_pat"]."</td><td class='success'>".$row["apellido_mat"]."</td><td class='success'>".$row["turno"]."</td><td class='success'>".$row["fecha"]."</td><td class='success'>".$entrada."</td></td><td class='success'>".$row["hora_entrada"]."</td><td class='success'>".$comida."</td></td><td class='success'>".$row["hora_comida"]."</td><td class='success'>".$regreso."</td></td><td class='success'>".$row["hora_regreso"]."</td><td class='success'>".$salida."</td></td><td class='success'>".$row["hora_salida"]."</td>";
                    }
}else{    
    $sql = "SELECT COUNT(id_entrada) FROM checador JOIN usuarios WHERE id_user='$id' AND id_emp='$id'";
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
    $sql = "SELECT fecha,hora_entrada,hora_comida,hora_regreso,hora_salida,id_emp,nombre,apellido_pat,apellido_mat,turno FROM checador JOIN usuarios WHERE id_user='$id' AND id_emp='$id' ORDER BY id_entrada DESC $limit";
    $query = mysqli_query($con, $sql)  or die("Error: ".mysqli_error($con));;
    // This shows the user what page they are on, and the total number of pages
    $text1 = "Registros (<b>$rows</b>)&nbsp;&nbsp;";
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
            $paginationCtrls .= '<a class = "btn btn-info"  href="'.$_SERVER['PHP_SELF'].'?opc=1&pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
            // Render clickable number links that should appear on the left of the target page number
            for($i = $pagenum-4; $i < $pagenum; $i++){
                if($i > 0){
                    $paginationCtrls .= '<a class = "btn btn-info"  href="'.$_SERVER['PHP_SELF'].'?opc=1&pn='.$i.'">'.$i.'</a> &nbsp; ';
                }
            }
        }
        // Render the target page number, but without it being a link
        $paginationCtrls .= ''.$pagenum.' &nbsp; ';
        // Render clickable number links that should appear on the right of the target page number
        for($i = $pagenum+1; $i <= $last; $i++){
            $paginationCtrls .= '<a class = "btn btn-info"  href="'.$_SERVER['PHP_SELF'].'?opc=1&pn='.$i.'">'.$i.'</a> &nbsp; ';
            if($i >= $pagenum+4){
                break;
            }
        }
        // This does the same as above, only checking if we are on the last page, and then generating the "Next"
        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $paginationCtrls .= ' &nbsp; &nbsp; <a class = "btn btn-info" href="'.$_SERVER['PHP_SELF'].'?opc=1&pn='.$next.'">Next</a> ';
        }
    }
    $list = '';
     while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                        $entrada="08:00:00";
                        $comida="14:00:00";
                        $regreso="15:00:00";
                        $salida="17:00:00";
                        echo "<tr>\n";
                        echo "<td class = 'success'><a href = '?opc=3&id=".$row["id_emp"]."'>".$row["nombre"]."</a></td> ";
                        echo "<td class='success'> ".$row["apellido_pat"]."</td><td class='success'>".$row["apellido_mat"]."</td><td class='success'>".$row["turno"]."</td><td class='success'>".$row["fecha"]."</td><td class='success'>".$entrada."</td></td><td class='success'>".$row["hora_entrada"]."</td><td class='success'>".$comida."</td></td><td class='success'>".$row["hora_comida"]."</td><td class='success'>".$regreso."</td></td><td class='success'>".$row["hora_regreso"]."</td><td class='success'>".$salida."</td></td><td class='success'>".$row["hora_salida"]."</td>";
                    }
}
?>