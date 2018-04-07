<?php


$usuario = $_GET['iduser'];


$con = new PDO('mysql:host=mysqlcarwest.cdbsdrwiat5y.us-west-2.rds.amazonaws.com;dbname=makerspr_videos', 'eimepe', 'eimepe73');
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$consulta = $con->prepare('SELECT * FROM usuario where id = :iduser and estado = 1 ');
  $consulta->execute(array(':iduser'=>$usuario));
   $registros = $consulta->fetch();



   $consultap = $con->prepare('SELECT * FROM puntajesvideos where iduser = :iduser ');
  $consultap->execute(array(':iduser'=>$usuario));
   $registrosp = $consultap->fetchAll();


   $puntaje = 0;

 foreach($registrosp as $dato){

	 $puntaje = $puntaje+$dato['puntaje'];
 }










  if($registros!=""){




		$response["success"] = 1;
		$response["nombre"] = $registros["nombre"];
		$response["codigo"] = $registros["codigo"];
		$response["correo"] = $registros["correo"];
		$response["tel"] = $registros["tel"];
		$response["direccion"] = $registros["direccion"];
		$response["puntaje"] = $puntaje;


         echo json_encode($response);
	  }else{

		$response["success"] = 0;
        die(json_encode($response));
	  }






?>
