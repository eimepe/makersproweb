<?php
 

require('dbConnect.php');
header ('Content-type: text/html; charset=utf-8');
$query_num_services =  mysql_query("SELECT * FROM categorias ", $conexion);
$num_total_registros = mysql_num_rows($query_num_services);

//Si hay registros
 if ($num_total_registros > 0) {
    //numero de registros por página
    $rowsPerPage = 7;

    //por defecto mostramos la página 1
    $pageNum = 1;

    // si $_GET['page'] esta definido, usamos este número de página
    if(isset($_GET['page'])) {
        sleep(1);
        $pageNum = $_GET['page'];
    }
    
    
    $res = array();

    //contando el desplazamiento
    $offset = ($pageNum - 1) * $rowsPerPage;
    $total_paginas = ceil($num_total_registros / $rowsPerPage);

    $query_services = mysql_query("SELECT * FROM categorias ORDER BY posicion ASC ", $conexion);
    while ($row_services = mysql_fetch_array($query_services)) {
 array_push($res, array(
 "name"=>utf8_encode ($row_services['categoria']),
 "publisher"=>$row_services['id'],
 "image"=>$row_services['img'],
 "tipo"=>$row_services['tipo']
 )
 );
 }
 //Displaying the array in json format 
 echo json_encode($res);

}else{
    echo "over";
}
    
    
    