<?php
error_reporting(E_ERROR);
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connects.php';

 
// connecting to db
$db = new DB_CONNECT();
 
// get all products from products table



if(5==5){
	$result = mysql_query("SELECT * FROM img");
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
     
       $clientes = array();
    while ($row = mysql_fetch_array($result)) {
		
		$id=$row['id'];
		$nombre=$row['nombre'];
		$img=$row['img'];
		$url=$row['url'];
    
	
	 $clientes[] = array('id'=> $id, 'nombre'=> $nombre, 'img'=> $img, 'url'=> $url
                        );   
    }

    $stra =  json_encode($clientes);
	
	echo '{"img":'.$stra.'}';
	
	
	
	
	
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    // echo no users JSON
    echo json_encode($response);
}
	
	}elseif($_POST['perfil']==3){
$result = mysql_query("SELECT * FROM usuario where perfil = 5");
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["usuarios"] = array();
 
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $users = array();
        $users["id"] = $row["id"];
        $users["usuario"] = $row["nombreyapellido"];
        // push single product into final response array
        array_push($response["usuarios"], $users);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
	
	
	
	
	
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    // echo no users JSON
    echo json_encode($response);
}

	}
?>