
<?php
include("include/connect.php");
$total=0;
foreach($_SESSION['cart'] as $key)
{
   $sql="SELECT * FROM products WHERE id='$key'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row["pname"];
    echo $name,"<br>";  
    $price=$row["price"];
    $price=(int)$price;
    $total+=$price;
}
echo "total is",$total,"<br>";
$quantity=array_count_values($_SESSION['cart']);
foreach ($quantity as $key => $value) {
echo "<br>",$key,"<br>",$value;
}
?>