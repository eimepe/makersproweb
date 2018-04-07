<?php
 
$id = $_GET['id'];
require('dbConnect.php');
header ('Content-type: text/html; charset=utf-8');


//Si hay registros
 if (1==1) {
     
      $res = array();
   
    $query_services = mysql_query("SELECT * FROM usuario where id = ".$id.' and estado=1', $conexion);
    while ($row_services = mysql_fetch_array($query_services)) {
        
        
        if(isset($row_services['id'])){

                    
 array_push($res, array(
     "succes"=>'1',
 "name"=>utf8_encode ($row_services['nombre']),
 "publisher"=>$row_services['id'],
 "image"=>$row_services['cc'],
 "tipo"=>$row_services['correo']
 )
 );
        }else{
            
            
             array_push($res, array(
     "succes"=>'0',
 "name"=>'0',
 "publisher"=>'0',
 "image"=>'0',
 "tipo"=>'0'
 )
 );

        }
 }
 //Displaying the array in json format 
 echo json_encode($res);

}else{
    echo "over";
}
 