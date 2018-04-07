<?php


$usuario = $_GET['iduser'];
$video = $_GET['idvideo'];

$idcate = $_GET['idcate'];

$con = new PDO('mysql:host=mysqlcarwest.cdbsdrwiat5y.us-west-2.rds.amazonaws.com;dbname=makerspr_videos', 'eimepe', 'eimepe73');
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$consulta = $con->prepare('SELECT * FROM puntajesvideos where iduser = :iduser and idcategoria = :idcategoria ');
  $consulta->execute(array(':iduser'=>$usuario, ':idcategoria'=>$idcate));
   $registros = $consulta->fetchAll();

   $puntaje = 0;


  foreach($registros as $dato){

	  $puntaje = $puntaje+$dato['puntaje'];

  }




  if($registros!=""){




		$response["success"] = 1;
		$response["puntaje"] = $puntaje;


         echo json_encode($response);
	  }else{

		$response["success"] = 0;
        die(json_encode($response));
	  }






?>
