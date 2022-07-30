<?php
include("connect.php");
$_SESSION["name"]="fahis";
$name=$_SESSION["name"];
$id=$_SESSION["uid"];
$log=$_SESSION["log"];
echo $name;
echo $id;
echo $log;
?>