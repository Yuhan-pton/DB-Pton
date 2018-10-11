<?php
header("Content-type: text/html; charset=utf-8");
//Connect to the database
require_once("db_connect.php");
$pdo = db_connect();

if(empty($_POST)) {
    echo "Error!";
	echo "<a href='Equipment_Cost_Edit.php'>home</a>";
	exit();
}
		$stmt = $pdo->prepare("UPDATE Equipment_Cost SET Item = :Itema, Person_getting_estimate = :Persona, Number = :Numbera, Material_Cost = :M_Costa, Hours_of_Machining_and_Fabrication = :Hoursa, Cost_each=:Cost_ea, Total_Cost = :T_Costa, Which_Build=:Builda, Notes=:Notesa WHERE Item = :Itemb AND Person_getting_estimate = :Personb AND Number = :Numberb AND Material_Cost = :M_Costb AND Hours_of_Machining_and_Fabrication = :Hoursb AND Cost_each=:Cost_eb AND Total_Cost = :T_Costb AND Which_Build=:Buildb AND Notes=:Notesb");
		if ($stmt) {
            $stmt->bindValue(':Itema', $_POST['Itema'], PDO::PARAM_STR);
            $stmt->bindValue(':Persona', $_POST['Persona'], PDO::PARAM_STR);
            $stmt->bindValue(':Numbera', $_POST['Numbera'], PDO::PARAM_STR);
            $stmt->bindValue(':M_Costa', $_POST['M_Costa'], PDO::PARAM_STR);
            $stmt->bindValue(':Hoursa', $_POST['Hoursa'], PDO::PARAM_STR);
            $stmt->bindValue(':Cost_ea', $_POST['Cost_ea'], PDO::PARAM_STR);
            $stmt->bindValue(':T_Costa', $_POST['T_Costa'], PDO::PARAM_STR);
            $stmt->bindValue(':Builda', $_POST['Builda'], PDO::PARAM_STR);
            $stmt->bindValue(':Notesa', $_POST['Notesa'], PDO::PARAM_STR);
            $stmt->bindValue(':Itemb', $_POST['Itemb'], PDO::PARAM_STR);
            $stmt->bindValue(':Personb', $_POST['Personb'], PDO::PARAM_STR);
            $stmt->bindValue(':Numberb', $_POST['Numberb'], PDO::PARAM_STR);
            $stmt->bindValue(':M_Costb', $_POST['M_Costb'], PDO::PARAM_STR);
            $stmt->bindValue(':Hoursb', $_POST['Hoursb'], PDO::PARAM_STR);
            $stmt->bindValue(':Cost_eb', $_POST['Cost_eb'], PDO::PARAM_STR);
            $stmt->bindValue(':T_Costb', $_POST['T_Costb'], PDO::PARAM_STR);
            $stmt->bindValue(':Buildb', $_POST['Buildb'], PDO::PARAM_STR);
            $stmt->bindValue(':Notesb', $_POST['Notesb'], PDO::PARAM_STR);
		
			$stmt->execute();
		}
 
$pdo=null;	
$site = "http://128.112.85.137/Equipment_Cost_Edit.php";
header("Location: $site",true,303);
?>