<?php

//carga y se conecta a la base de datos
require("config.php");





if (!empty($_GET["id"])) {
    //obteneos los usuarios respecto a la usuario que llega por parametro
    $query = " 
            SELECT 
              *
            FROM usuario 
            WHERE 
                id = :id and estado = 1";
    
    $query_params = array(
        ':id' => $_GET["id"]
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
        if ($_GET['id'] === $row['id']) {
			
			
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