<?php
header("Content-type: text/html; charset=utf-8");
require_once("sql_connection.php");
$pdo = db_connect();
if(empty($_POST)) {
	echo "<a href='test_mysql.php'>home</a>";
	exit();
}	
		$stmt = $pdo->prepare("UPDATE testtable SET ID=:IDa, name=:Namea, price=:Pricea, detail=:Detaila WHERE ID=:IDb AND name=:Nameb AND price=:Priceb AND detail=:Detailb");
		if ($stmt) {
            $IDa = $_POST['IDa'];
            $Namea = $_POST['Namea'];
            $Pricea = $_POST['Pricea'];
            $Detaila = $_POST['Detaila'];
            $IDb = $_POST['IDb'];
            $Nameb = $_POST['Nameb'];
            $Priceb = $_POST['Priceb'];
            $Detailb = $_POST['Detailb'];

            $stmt->bindValue(':IDa', $IDa, PDO::PARAM_INT);
            $stmt->bindValue(':Namea', $Namea, PDO::PARAM_STR);
            $stmt->bindValue(':Pricea', $Pricea, PDO::PARAM_INT);
            $stmt->bindValue(':Detaila',$Detaila, PDO::PARAM_STR);
            $stmt->bindValue(':IDb', $IDb, PDO::PARAM_INT);
            $stmt->bindValue(':Nameb', $Nameb, PDO::PARAM_STR);
            $stmt->bindValue(':Priceb', $Priceb, PDO::PARAM_INT);
            $stmt->bindValue(':Detailb',$Detailb, PDO::PARAM_STR);
		
			$stmt->execute();		
			$stmt->closeCursor();
		}
 
$pdo=null;	
?>
 
<!DOCTYPE html>
<html>
<head>
<title>Edit</title>
<meta charset="utf-8">
</head>
<body>
<p><?="Edited"?></p>
<p><a href="./test_mysql.php">OK</a></p> 
</body>
</html>