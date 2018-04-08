<?php


$data = json_decode(file_get_contents('php://input'), true);


$con = new PDO('mysql:host=mysqlcarwest.cdbsdrwiat5y.us-west-2.rds.amazonaws.com;dbname=makerspr_videos', 'eimepe', 'eimepe73');
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$consultaf = $con->prepare('SELECT * FROM usuario where codigo = :iduser ');
  $consultaf->execute(array(':iduser'=>$data['codigo']));
   $registrosf = $consultaf->fetch();


   if($registrosf['id']!=""){

	   	$response["success"] = 0;
        die(json_encode($response));
   }else{


$consulta = $con->prepare('INSERT INTO usuario (
codigo,
clave,
nombre,
cc,
tel,
direccion,
correo,
austiciador,
platino,
esmeralda,
diamante,
edad,
estado
)values(:codigo,
:clave,
:nombre,
:cc,
:tel,
:direccion,
:correo,
:austiciador,
:platino,
:esmeralda,
:diamante,
:edad,
:estado) ');
  $consulta->execute(array(':codigo'=>$data['codigo'],
':clave'=>$data['clave'],
':nombre'=>$data['nombre'].' '.$data['apellido'],
':cc'=>"0",
':tel'=>$data['telefono'],
':direccion'=>"0",
':correo'=>$data['usuario'],
':austiciador'=>"",
':platino'=>$data['platino'],
':esmeralda'=>"0",
':diamante'=>"0",
':edad'=>"0",
':estado'=>0));


  $ids = $con->lastInsertId();










  if($ids!=0){


$para      = 'carlosymonica21@gmail.com';
$titulo    = 'Nuevos Usuarios para activar';
$mensaje   = 'Nuevos Usuarios para activar';
$cabeceras = 'From: webmaster@makerspro.com.co' . "\r\n" .
    'Reply-To: webmaster@makerspro.com.co' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);




		 $para1     =$data['usuario'];
$titulo1    = 'Gracias por Registrarse';
$mensaje1   = 'Gracias por Registrarse Su cuenta esta en proceso de Activacion';
$cabeceras1 = 'From: webmaster@makerspro.com.co' . "\r\n" .
    'Reply-To: webmaster@makerspro.com.co' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para1, $titulo1, $mensaje1, $cabeceras1);

		$response["success"] = 1;



         echo json_encode($response);
	  }else{

		$response["success"] = 0;
        die(json_encode($response));
	  }


   }



?>
