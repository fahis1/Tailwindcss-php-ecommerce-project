<?php
include("include/connect.php");
$uid = $_SESSION['uid'];
$id = $_GET['id'];

$query = "SELECT * FROM address WHERE user_id='$uid'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
foreach ($result as $row) {
    $did = $row['id'];
    $query = "UPDATE address SET type='0' where id='$did'";
    mysqli_query($conn, $query);
}
$query = "update address set type='1' where id='$id'";
mysqli_query($conn, $query);
echo '<script> window.location = "profile.php";</script>';
