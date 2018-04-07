<?php


$usuario = $_GET['iduser'];
$video = $_GET['idvideo'];
$puntos = $_GET['puntaje'];
$idcate = $_GET['idcate'];

$con = new PDO('mysql:host=localhost;dbname=makerspr_videos', 'makerspr_videos', '92040166809');
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
  
$consulta = $con->prepare('SELECT * FROM puntajesvideos where iduser = :iduser and idvideo = :idvideo ');
  $consulta->execute(array(':iduser'=>$usuario, ':idvideo'=>$video));
   $registros = $consulta->fetch();
 
  
  
  if($registros==''){
 
  
  
    
		
$consulta = $con->prepare('INSERT INTO puntajesvideos (iduser, idvideo, puntaje, idcategoria)values(:iduser, :idvideo, :puntaje, :idcategoria) ');
  $consulta->execute(array(':iduser'=>$usuario, ':idvideo'=>$video, ':puntaje'=>$puntos, ':idcategoria'=>$idcate));
   

  $ids = $con->lastInsertId();

  }else{
	  
	  
	  
$consulta = $con->prepare('UPDATE puntajesvideos SET puntaje = :puntaje where iduser = :iduser and idvideo = :idvideo ');
  $rows=$consulta->execute(array(':iduser'=>$usuario, ':idvideo'=>$video, ':puntaje'=>$puntos));
   

  $ids = true;

	 
  
	
	  
  }
  
	
  
  if($ids!=""){
	  
	  
		  
		  
		$response["success"] = 1;
	
		
         echo json_encode($response);
	  }else{
		  
		$response["success"] = 0;
        die(json_encode($response));
	  }
	  
	  
	  
  
  
  
?>