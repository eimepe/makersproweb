<?php

//error_reporting(0);
define('DB_SERVER', 'mysqlcarwest.cdbsdrwiat5y.us-west-2.rds.amazonaws.com');
define('DB_SERVER_USERNAME', 'eimepe');
define('DB_SERVER_PASSWORD', 'eimepe73');
define('DB_DATABASE', 'makerspr_videos');

$conexion = mysqli_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);

mysql_select_db(DB_DATABASE, $conexion);

?>
