<?php
$uid=$_SESSION["uid"];

$result = mysqli_query($conn,"SELECT SUM(nos) from cart where user_id=$uid");
$tnos=mysqli_fetch_row($result);
if($tnos[0]==NULL)
{
$_SESSION['count']=0;
}
else
$_SESSION['count']=$tnos[0];
if(!isset($cart)) 
{ 
  $cart=array();
  $sql="SELECT nos,product_id FROM CART where user_id=$uid";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$nos=array();
foreach($result as $row)
{
$cart[$row['product_id']] = $row['nos'];
}
  $_SESSION['count'];
} 
$_SESSION['$cart']=$cart;
if (isset($_POST["clear_cart"]))
{
  $sql="DELETE FROM cart where user_id='$uid'";
  mysqli_query($conn,$sql);
  $cart=array();
  $_SESSION['count']=0;
}
if (isset($_POST["checkout"]))
{
header("Location:payment.php");
}
?>