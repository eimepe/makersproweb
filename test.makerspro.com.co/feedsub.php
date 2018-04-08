<?php


require('dbConnect.php');

require("../config.php");





    $query = "SELECT * FROM subcategorias where categoria = ".$_GET['id']." ORDER BY id ASC";

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
      "name"=>$row_services['categoria'],
      "publisher"=>$row_services['id'],
      "image"=>$row_services['img'],
      "tipo"=>$row_services['tipo']
      )
      );

    }

     echo json_encode($res);
