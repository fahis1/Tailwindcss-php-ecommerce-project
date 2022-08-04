<?php
include("connect.php");
$log=$_SESSION["log"];
if($log!=2)
{
    header("Location: ../index.php");
    echo "<script>window.location = '../index.php'; </script>";
}
?>  
