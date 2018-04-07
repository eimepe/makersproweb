<?php

error_reporting(0);
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'makerspr_videos');
define('DB_SERVER_PASSWORD', '92040166809');
define('DB_DATABASE', 'makerspr_videos');

$conexion = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);

mysql_select_db(DB_DATABASE, $conexion);

?>