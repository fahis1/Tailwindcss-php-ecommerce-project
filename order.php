<?php
include("include/connect.php");
$ocart=json_encode($_SESSION['$cart']);
$pid=$_GET['id'];
$uid=$_SESSION["uid"];
print_r($ocart);
$sql = "INSERT INTO `orders` (`user_id`, `status`, `address`, `order_time`,`products`) VALUES ('$uid', '0', 'address test', NOW(),'$ocart');";
if(mysqli_query($conn,$sql))
{
    echo "<h1>ORDER PLACED</h1>";
}
$sql="DELETE FROM cart where user_id='$uid'";
  mysqli_query($conn,$sql);
  $cart=array();
  $_SESSION['$cart']=array();
?>
<html>
    <head>
    <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    <a href="shop.php"><button class="btn btn-primary">HOME</button></a>
        </body>
</html>