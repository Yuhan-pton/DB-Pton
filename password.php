<!DOCTYPE html>
<html>
<head>
<title>Database</title>
<meta charset="utf-8">
</head>
<!--Create a form for user authentification-->
<!--post the following data to "test_delete.php" when the button is pushed-->
<form action="test_delete.php" method="post" onsubmit="return confirm('Are you sure you want to submit this form?');">
    <div>Username and Password:</div>
    <input name="user" type="text"/>
    <input name="pass" type="password"/>
    <input type="hidden" name="ID" value="<?=$_POST['ID']?>">
    <input type="hidden" name="Name" value="<?=$_POST['Name']?>">
    <input type="hidden" name="Price" value="<?=$_POST['Price']?>">
    <input type="hidden" name="Detail" value="<?=$_POST['Detail']?>">
    <input type="submit" value="OK">
</form>

<style>
#popup {
    width:160px;
    height:80px;
    padding:20px;
    background-color:gray;    
    position:absolute;
    top:100px;
    left:100px;
}
</style>