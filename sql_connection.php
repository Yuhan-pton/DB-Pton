<?php
 //This is a function to connect to the database
function db_connect(){
	//Server and the name of the database
	$dsn = 'mysql:host=127.0.0.1;port=3308;dbname=testdata;charset=utf8'; 
	// username 
	$user = 'root'; 
	// password
    $password = 'kohdai0621';
    
    try {
		$dbh = new PDO($dsn, $user, $password);
		// set the PDO error mode to exception
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
	return $dbh;
}
 
?>