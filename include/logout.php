<?php
include("connect.php");
session_unset();
session_destroy(); 
header("Location: ../index.php");
echo "<script>window.location = '../index.php'; </script>";
?>