<?php

require("../config.php");
$categoria = $_GET['categoria'];
$subcategoria = $_GET['subcategoria'];
$ultcategoria = $_GET['ultcategoria'];



$query = "SELECT * FROM img ORDER BY id ASC";

$query_params = array();

try {
    $stmt   = $db->prepare($query);
    $result = $stmt->execute($query_params);
}
catch (PDOException $ex) {
    //para testear pueden utilizar lo de abajo
    //die("la consulta murio " . $ex->getMessage());

    $response["success"] = 0;
    $response["message"] = "Problema con la base de datos, vuelve a intetarlo";
    die(json_encode($response));

}

//la variable a continuación nos permitirará determinar
//si es o no la información correcta
//la inicializamos en "false"
$validated_info = false;

//bamos a buscar a todas las filas
$row = $stmt->fetchAll();



$res = array();
foreach ($row as $row_services){

  array_push($res, array(
    "name"=>$row_services['nombre'],
    "publisher"=>$row_services['img'],
    "image"=>$row_services['url']
  )
  );

}

 echo json_encode($res);
