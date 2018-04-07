<?php

//carga y se conecta a la base de datos
require("config.php");

$data = json_decode(file_get_contents('php://input'), true);



if (!empty($data["usuario"])) {
    //obteneos los usuarios respecto a la usuario que llega por parametro
    $query = " 
            SELECT 
              *
            FROM usuario 
            WHERE 
                codigo = :username and estado = 1";
    
    $query_params = array(
        ':username' => $data['usuario']
    );
    
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
    $row = $stmt->fetch();
    
    
    if ($row) {
        //si el password viene encryptado debemos desencryptarlo acá
        // ++ DESCRYPTAR ++//

        //encaso que no lo este, solo comparamos como acontinuación
        if ($data['clave'] === $row['clave']) {
			
			
	$login_ok = true;
           
			
			
			
        }
    }
    
    // así como nos logueamos en facebook, twitter etc!
    // Otherwise, we display a login failed message and show the login form again 
    if ($login_ok==true) {
        $response["success"] = 1;
		$response["codigo"]=$row["codigo"];
        $response["nombre"] = $row["nombre"];
		$response["correo"]=$row["correo"];
		$response["idmsql"] = $row["id"];
		$response["edad"] = $row["edad"];
        die(json_encode($response));
    } else {
        $response["success"] = 0;
        $response["message"] = "Login INCORRECTO";
        die(json_encode($response));
    }
} else {
?>
  <h1>Login</h1> 
  <form action="login.php" method="post"> 
      Username:<br /> 
      <input type="text" name="usuario" placeholder="username" /> 
      <br /><br /> 
      Password:<br /> 
      <input type="password" name="clave" placeholder="password" value="" /> 
      <br /><br /> 
      <input type="submit" value="Login" /> 
  </form> 
  <a href="register.php">Register</a>
 <?php
}

?> 