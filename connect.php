<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$host = "127.0.0.1";
$username = "root";
$password = "";
$database="shoestore";
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>