<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div></div>
        <div></div>
    </body>
</html>
<?php
include("connect.php");
$pid=$_GET['id'];
$sql="SELECT * FROM products WHERE id='$pid'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo 'NAME ',$row["pname"];
echo 'description ',$row["pdesc"];
?>