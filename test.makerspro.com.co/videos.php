<?php 
 
    
    
    
    
  
 

require('dbConnect.php');


$categoria = $_GET['categoria']; 
$subcategoria = $_GET['subcategoria']; 
$ultcategoria = $_GET['ultcategoria']; 



//Si hay registros
 if (1 > 0) {
    //numero de registros por página
    $rowsPerPage = 4;

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

    $query_services = mysql_query("SELECT * FROM videos where categoria =". $categoria. " and subcategoria= ".$subcategoria." and ultcategoria= ".$ultcategoria." ORDER BY id ASC", $conexion);
    while ($row_services = mysql_fetch_array($query_services)) {
 array_push($res, array(
 "name"=>$row_services['video'],
 "publisher"=>$row_services['id'],
 "image"=>$row_services['img'])
 );
 }
 //Displaying the array in json format 
 echo json_encode($res);

}else{
    echo "over";
}
    
    
    
    
    
    
    
    
    