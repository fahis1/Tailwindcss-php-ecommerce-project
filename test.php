<?php
include("include/connect.php");
$name=$_SESSION["name"];
$id=$_SESSION["uid"];
$log=$_SESSION["log"];
$email=$_SESSION["email"];
echo 'username: '.$name.'<br>';
echo 'user id: '.$id.'<br>';
echo 'email: '.$email.'<br>';
echo 'logged in : '.$log.'<br>';
?>  
