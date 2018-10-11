<!DOCTYPE html>
<html>
<head>
<title>Equipment Cost</title>
<meta charset="utf-8">
<!-- apply desigh-->
<link rel="stylesheet" type="text/css" href="db_edit.css">
<link rel="stylesheet" type="text/css" href="util.css">
<!--------------->

</head>
<body>
<h1>Equipment Cost</h1>
<div>


    <div class = "Head">
        <table>
            <thead>
                <!--Create a head of the table -->
                <tr>
                    <th class = "column1">Item</th>
                    <th class = "column2">Person getting estimate</th>
                    <th class = "column3">Number</th>
                    <th class = "column4">Material_Cost</th>
                    <th class = "column5">Hours of Machining and Fabrication</th>
                    <th class = "column6">Cost each</th>
                    <th class = "column7">Total Cost</th>
                    <th class = "column8">Which Build</th>
                    <th class = "column9">Notes</th>
                    <th class = "column10"></th>
                </tr>
            </thead>
        </table>
    </div>
    <div>
    <?php
    header("Content-type: text/html; charset=utf-8");
    //Connect to the database
    require_once("db_connect.php");
    $pdo = db_connect();
    
    //Take data from the database by using SQL
    foreach ( $pdo->query ( 'select * from Equipment_Cost' ) as $row ) {
        if((!empty($_POST))&&($_POST['Item']===$row['Item'])&&(!isset($_POST['Person']) or $_POST['Person']==$row['Person_getting_estimate'])&&(!isset($_POST['Number']) or $_POST['Number']==$row['Number'])&&(!isset($_POST['M_Cost']) or $_POST['M_Cost']==$row['Material_Cost'])&&(!isset($_POST['Hours']) or $_POST['Hours']==$row['Hours_of_machining_and_fabrication'])&&(!isset($_POST['Cost_e']) or $_POST['Cost_e']==$row['Cost_each'])&&(!isset($_POST['T_Cost']) or $_POST['T_Cost']==$row['Total_Cost'])&&(!isset($_POST['Build']) or $_POST['Build']==$row['Which_build'])&&(!isset($_POST['Notes']) or $_POST['Notes']==$row['Notes'])){
    ?>
        <table>    
            <!--Body of the table -->
            <tbody>
                <tr  class = Line>
                <form action="./EC_Edit.php" method="post">
                    <td class = "column1"><input name='Itema' type="text" value ="<?=$row['Item']?>"></td>
                    <td class = "column2"><input name='Persona' type="text" value ="<?=$row['Person_getting_estimate']?>"></td>
                    <td class = "column3"><input name='Numbera' type="text" value ="<?=$row['Number']?>"></td>
                    <td class = "column4"><input name='M_Costa' type="text" value ="<?=$row['Material_Cost']?>"></td>
                    <td class = "column5"><input name='Hoursa' type="text" value ="<?=$row['Hours_of_machining_and_fabrication']?>"></td>
                    <td class = "column6"><input name='Cost_ea' type="text" value ="<?=$row['Cost_each']?>"></td>
                    <td class = "column7"><input name='T_Costa' type="text" value ="<?=$row['Total_Cost']?>"></td>
                    <td class = "column8"><input name='Builda' type="text" value ="<?=$row['Which_build']?>"></td>
                    <td class = "column9"><input name='Notesa' type="text" value ="<?=$row['Notes']?>"></td>
                    <td class = "column10">
                    <input id="confirm" type="submit" value="OK">
                    <input name='Itemb' type="hidden" value ="<?=$row['Item']?>">
                    <input name='Personb' type="hidden" value ="<?=$row['Person_getting_estimate']?>">
                    <input name='Numberb' type="hidden" value ="<?=$row['Number']?>">
                    <input name='M_Costb' type="hidden" value ="<?=$row['Material_Cost']?>">
                    <input name='Hoursb' type="hidden" value ="<?=$row['Hours_of_machining_and_fabrication']?>">
                    <input name='Cost_eb' type="hidden" value ="<?=$row['Cost_each']?>">
                    <input name='T_Costb' type="hidden" value ="<?=$row['Total_Cost']?>">
                    <input name='Buildb' type="hidden" value ="<?=$row['Which_build']?>">
                    <input name='Notesb' type="hidden" value ="<?=$row['Notes']?>">
                    </td>
                </form>
                </tr>
            </tbody>
        </table>
    <?php
    }else{
    ?>
        <table>
            <tbody>
            <tr  class = Line>
                    <td class = "column1"><?=$row['Item']?></td>
                    <td class = "column2"><?=$row['Person_getting_estimate']?></td>
                    <td class = "column3"><?=$row['Number']?></td>
                    <td class = "column4"><?=$row['Material_Cost']?></td>
                    <td class = "column5"><?=$row['Hours_of_machining_and_fabrication']?></td>
                    <td class = "column6"><?=$row['Cost_each']?></td>
                    <td class = "column7"><?=$row['Total_Cost']?></td>
                    <td class = "column8"><?=$row['Which_build']?></td>
                    <td class = "column9"><?=$row['Notes']?></td>
                    <td class= "column10">
                    <form action="Equipment_Cost_Edit.php" method="post">
                        <input id="edit" type="submit" value="Edit">
                        <input name='Item' type="hidden" value ="<?=$row['Item']?>">
                        <input name='Person' type="hidden" value ="<?=$row['Person_getting_estimate']?>">
                        <input name='Number' type="hidden" value ="<?=$row['Number']?>">
                        <input name='M_Cost' type="hidden" value ="<?=$row['Material_Cost']?>">
                        <input name='Hours' type="hidden" value ="<?=$row['Hours_of_machining_and_fabrication']?>">
                        <input name='Cost_e' type="hidden" value ="<?=$row['Cost_each']?>">
                        <input name='T_Cost' type="hidden" value ="<?=$row['Total_Cost']?>">
                        <input name='Build' type="hidden" value ="<?=$row['Which_build']?>">
                        <input name='Notes' type="hidden" value ="<?=$row['Notes']?>">
                    </form>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php
        }
    }
    ?>
    </div>
    </div>
</div>
</body>
</html>