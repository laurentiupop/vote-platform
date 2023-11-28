<?php
//   define('DB_SERVER', '127.0.0.1:3306');
    define('DB_SERVER', '188.215.64.11');
   
   define('DB_USERNAME', "scoutms_new");
   define('DB_PASSWORD', 'stefi26#');
   define('DB_DATABASE', 'scoutms_new');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   if(!$db){
   	echo "Error: Unable to connect to MySQL." . PHP_EOL;
    	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    	exit;
   }

?>