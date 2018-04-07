<?php


$idvideo = $_GET['idvideo'];
$npregunta = $_GET['npregunta'];

$con = new PDO('mysql:host=mysqlcarwest.cdbsdrwiat5y.us-west-2.rds.amazonaws.com;dbname=makerspr_videos', 'eimepe', 'eimepe73');
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


     $stmt = $con->prepare('SELECT * FROM preguntas where idvideo=:idvideo and npregunta = :npregunta');
  $stmt->execute(array(':idvideo'=>$idvideo, ':npregunta'=>$npregunta));
  $rows = $stmt->fetch();

  if($rows['id']!=""){




		$response["success"] = 1;
		$response["pregunta"]=utf8_encode($rows["pregunta"]);
		$response["a"]=utf8_encode($rows["a"]);
		$response["b"] = utf8_encode($rows["b"]);
		$response["c"] = utf8_encode($rows["c"]);
		$response["d"] = utf8_encode($rows["d"]);
		$response["respuesta"] = utf8_encode($rows["respuesta"]);
         echo json_encode($response);
	  }else{

		$response["success"] = 0;
        die(json_encode($response));
	  }






?>
