<!DOCTYPE html>
<html>
<head>
<title>Database</title>
<meta charset="utf-8">
<!-- for desigh-->
<link rel="stylesheet" type="text/css" href="testdb.css">
<link rel="stylesheet" type="text/css" href="util.css">
<!--------------->
</head>
<body>
<h1>Database</h1>
<div>
<!--Create add Button -->
<p id = add><a href = "./test_add.html"> Add Data </a></p>
    <div class = "Head">
        <table>
            <thead>
                <!--Create a head of the table -->
                <tr>
                    <th class = "column1">ID</th>
                    <th class = "column2">Name</th>
                    <th class = "column3">Price</th>
                    <th class = "column4">Detail</th>
                    <th class = "column5">Edit</th>
                    <th class = "column6">Delete</th>
                </tr>
            </thead>
        </table>
    </div>
    <div>
    <?php
    header("Content-type: text/html; charset=utf-8");
    //Connect to the database
    require_once("sql_connection.php");
    $pdo = db_connect();
    //Take data from the database by using SQL
    foreach ( $pdo->query ( 'select * from testtable' ) as $row ) {
    ?>
        <div class = Line>
        <table>
            <!--Body of the table -->
            <tbody>
                <tr>
                    <td class = "column1"><?=$row['ID']?></td>
                    <td class = "column2"><?=$row['name']?></td>
                    <td class = "column3"><?=$row['price']?></td>
                    <td class = "column4"><?=$row['detail']?></td>
                    <!-- Edit Button-->
                    <td class = "column5">
                        <!-- post the following data to "test_edit.php" when this button is pushed-->
                        <form action="test_edit.php" method="post">
                        <input id="edit" type="submit" value="Edit">
                        <input type="hidden" name="ID" value="<?=$row['ID']?>">
                        <input type="hidden" name="Name" value="<?=$row['name']?>">
                        <input type="hidden" name="Price" value="<?=$row['price']?>">
                        <input type="hidden" name="Detail" value="<?=$row['detail']?>">
                        </form>
                    </td>
                    <!-- Delete Button-->
                    <td class="column6">
                        <!-- post the following data to "password.php" when this button is pushed-->
                        <form action="password.php" method="post">
                        <input id="delete" type="submit" value="Delete">
                        <input type="hidden" name="ID" value="<?=$row['ID']?>">
                        <input type="hidden" name="Name" value="<?=$row['name']?>">
                        <input type="hidden" name="Price" value="<?=$row['price']?>">
                        <input type="hidden" name="Detail" value="<?=$row['detail']?>">
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
    }
    ?>
    </div>
</div>

</body>
</html>