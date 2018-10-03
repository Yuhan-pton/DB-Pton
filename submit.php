<?php
header("Content-type: text/html; charset=utf-8");
 
if(empty($_POST)) {
	header("Location: test_add.html");
	exit();
}else{
	if (!isset($_POST['ID'])  || $_POST['ID'] === "" ){
		$errors['ID'] = "No ID";
	}
}

	$dsn = 'mysql:host=127.0.0.1;port=3308;dbname=testdata;charset=utf8';
	$user = 'root';
	$password = 'kohdai0621';
 
	try{
		$dbh = new PDO($dsn, $user, $password);
		$statement = $dbh->prepare("INSERT INTO testtable (ID,Name,Price,Detail) VALUES (:ID,:Name,:Price,:Detail)");
	
		if($statement){
            $ID = $_POST['ID'];
            $Name = $_POST['Name'];
            $Price = $_POST['Price'];
            $Detail = $_POST['Detail'];

            $statement->bindValue(':ID', $ID, PDO::PARAM_INT);
            $statement->bindValue(':Name', $Name, PDO::PARAM_STR);
            $statement->bindValue(':Price', $Price, PDO::PARAM_INT);
            $statement->bindValue(':Detail',$Detail, PDO::PARAM_STR);
		
			if(!$statement->execute()){
				$errors['error'] = "error";
			}
			
			$dbh = null;	
		}
	
	}catch (PDOException $e){
		print('Error:'.$e->getMessage());
		$errors['error'] = "error";
	}

 
?>
 
<!DOCTYPE html>
<html>
<head>
<title>ADD</title>
<meta charset="utf-8">
</head>
<body>
 
<p><?="Added"?></p>
<p><a href="./test_mysql.php">OK</a></p> 
</body>
</html>