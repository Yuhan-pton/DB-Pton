<?php
    //User authentification
    if(($_POST['user']!== 'user1') or ($_POST['pass']!== 'pass')){
        header("Location: test_mysql.php");
    }else{
    if(isset($_POST['ID']) && isset($_POST['Name']) && isset($_POST['Price']) && isset($_POST['Detail'])){
	try{
        //Connect to the database
        require_once("sql_connection.php");
        $pdo = db_connect();
        //Delete data posted from "test_mysql.php" using SQL
		$statement = $dbh->prepare("DELETE FROM testtable WHERE ID = :ID AND Name = :Name AND Price = :Price AND Detail = :Detail");
	
		if($statement){
            $ID = $_POST['ID'];
            $Name = $_POST['Name'];
            $Price = $_POST['Price'];
            $Detail = $_POST['Detail'];

            $statement->bindValue(':ID', $ID, PDO::PARAM_INT);
            $statement->bindValue(':Name', $Name, PDO::PARAM_STR);
            $statement->bindValue(':Price', $Price, PDO::PARAM_INT);
            $statement->bindValue(':Detail',$Detail, PDO::PARAM_STR);
		
			$statement->execute();
			
			$dbh = null;	
		}
	
	}catch (PDOException $e){
		print('Error:'.$e->getMessage());
		$errors['error'] = "error";
    }
}else{
    echo "error!";
}
    }
 
?>

<!DOCTYPE html>
<html>
<head>
<title>DELETE</title>
<meta charset="utf-8">
</head>
<body>
 
<p><?="deleted"?></p>
<p><a href="./test_mysql.php">OK</a></p> 
</body>
</html>