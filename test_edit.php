<?php
header("Content-type: text/html; charset=utf-8");
//Connect to the database
require_once("sql_connection.php");
$pdo = db_connect();
 
if(empty($_POST)) {
	echo "<a href='test_mysql.php'>home</a>";
	exit();
}else{
	if (!isset($_POST['ID'])  || !is_numeric($_POST['ID']) ){
		echo "ID error";
		exit();
	}else{
		//Select data posted from "test_mysql.php" using SQL
		$stmt = $pdo->prepare("SELECT * FROM testtable WHERE ID=:ID AND name=:Name AND price=:Price AND detail=:Detail");
		if ($stmt) {
            $ID = $_POST['ID'];
            $Name = $_POST['Name'];
            $Price = $_POST['Price'];
            $Detail = $_POST['Detail'];
    
            $stmt->bindValue(':ID', $ID, PDO::PARAM_INT);
            $stmt->bindValue(':Name', $Name, PDO::PARAM_STR);
            $stmt->bindValue(':Price', $Price, PDO::PARAM_INT);
            $stmt->bindValue(':Detail',$Detail, PDO::PARAM_STR);
		
			$stmt->execute();
            $stmt->fetchColumn();
			$stmt->closeCursor();
		}
	}
}
$pdo = null;
 
?>
 
<!DOCTYPE html>
<html>
<head>
<title>EDIT</title>
</head>
<body>
<h1>Edit Data</h1> 
<!-- Create a form for editing -->
<!-- post the following data to "edit_submit.php" when this button is pushed-->
<form action="edit_submit.php" method="post" onsubmit="return confirm('Are you sure you want to submit this form?');">
<input type="text" name="IDa" value="<?=htmlspecialchars($ID, ENT_QUOTES, 'UTF-8')?>">
<input type="text" name="Namea" value="<?=htmlspecialchars($Name, ENT_QUOTES, 'UTF-8')?>">
<input type="text" name="Pricea" value="<?=htmlspecialchars($Price, ENT_QUOTES, 'UTF-8')?>">
<input type="text" name="Detaila" value="<?=htmlspecialchars($Detail, ENT_QUOTES, 'UTF-8')?>">
<input type="hidden" name="IDb" value="<?=$ID?>">
<input type="hidden" name="Nameb" value="<?=$Name?>">
<input type="hidden" name="Priceb" value="<?=$Price?>">
<input type="hidden" name="Detailb" value="<?=$Detail?>">
<input type="submit" value="Edit">
</form>
 
</body>
</html>