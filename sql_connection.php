<?php
 
function db_connect(){
	$dsn = 'mysql:host=127.0.0.1;port=3308;dbname=testdata;charset=utf8';  
	$user = 'root'; 
    $password = 'kohdai0621';
    
    $dbh = new PDO($dsn, $user, $password);
	return $dbh;
}
 
?>