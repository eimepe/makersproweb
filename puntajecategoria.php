<?php

$idusuario = $_GET['iduser'];
$idcategoria = $_GET['idcategoria'];


if(isset($_GET['iduser']) && isset($_GET['idcategoria']) ){
$con = new PDO('mysql:host=mysqlcarwest.cdbsdrwiat5y.us-west-2.rds.amazonaws.com;dbname=makerspr_videos', 'eimepe', 'eimepe73');
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $stmt = $con->prepare('SELECT * FROM videos where categoria=:categoria');
  $stmt->execute(array(':categoria'=>$idcategoria));

  $totalvideos =0;
  $puntajeminimo = 0;



  foreach($stmt as $cantidad){
	 $totalvideos = $totalvideos+1;


  }

  $puntajeminimo = $totalvideos * 400;


  $puntaje = $con->prepare('SELECT * FROM puntajesvideos where idcategoria=:idcategoria AND iduser=:iduser');
  $puntaje->execute(array(':idcategoria'=>$idcategoria, ':iduser'=>$idusuario));

  $puntajefinal = 0;

  foreach($puntaje as $puntajef){
	  $puntajefinal = $puntajefinal+$puntajef['puntaje'];

  }

if($puntajefinal >= $puntajeminimo){
	echo "1";
}else{
	echo "0";
}

}
