<?php
include("include/connect.php");
include("include/cart.php");
?>

<!DOCTYPE html>
<html lang="en" class="bg-sun-300">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
      *{
        font-family: 'Inter', sans-serif;
      }
      </style>
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"> 
    <style>
      /* Hide scrollbar for Chrome, Safari and Opera */
*::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
* {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
    </style>
</head>
<body>

<div class="navbar flex justify-between flex-row bg-sun-50 h-16 rounded-full m-2 top-2 sticky w-auto z-50">
  <div class="flex-1">
    <a href="homepage.php" class="btn btn-ghost normal-case text-xl"><img src="./images/LoGo2.png" width="150" height="150" alt="logo"></a>
  </div>

    <div class="form-control">
      <form action="" method="post">
        <div class="input-group">
    <input type="text" placeholder="Search…" name="search" class="input input-bordered" />
    <button class="btn btn-square">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
    </button>
  </div>
      </form>    
    </div>
  <div class="flex-none">
    <div class="dropdown dropdown-end">
      <label tabindex="0" class="btn btn-ghost btn-circle">
        <div class="indicator">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
          <?php
          echo '<span class="badge badge-sm indicator-item">',$_SESSION['count'],'</span>';
          ?>
        </div>
      </label>
      <div tabindex="0" class="mt-3 card card-compact dropdown-content w-max bg-base-100 shadow">
        <div class="card-body">
        <?php 
          echo "<span class='font-bold text-lg'>",$_SESSION['count']," Items</span>";
          $total=0;
          $n=0;
foreach ($cart as $key => $value)
{
  $n+=1;
   $sql="SELECT * FROM products WHERE id='$key'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row["pname"];
    echo '<h2 class=" text-base text-dblue-300 truncate">',$n,'.&ensp;',strtoupper($name),'&ensp;<span class="badge badge-md ">',$value,'</span></h2>&ensp;';  
    $price=$row["price"];
    $price=(int)$price;
    $total+=$price*$value;
    
}
echo "<span class=' text-base'><b>Subtotal:</b> <span class=''>₹",$total,"</span></span>";
      ?>
          <form method="post" class="card-actions">
            <button class="btn btn-primary btn-block" name="checkout">Checkout</button>
            <button class="btn btn-secondary btn-block" name="clear_cart">Clear cart</button>
          </form>
        </div>
      </div>
    </div>
    <div class="dropdown dropdown-end">
      <label tabindex="0" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
          <img src="https://placeimg.com/80/80/people" />
        </div>
      </label>
      <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
      <li><a href="profile.php">Profile</a></li>
        <li><a href="feedback.php">Feedback</a></li>
        <li><a href="list_user_orders.php">Orders</a></li>
        <li><a href="include/logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</div>
</body>
</html>
<?php 
include("include/connect.php");

if (isset($_POST["search"]))//search block
{
  $srch=$_POST["search"];
$sql="SELECT * FROM products where pname like '%$srch%'";
}
else
$sql="SELECT * FROM products";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

echo "<div class='bg-sun-300 flex flex-wrap  justify-center flex-row'>";
foreach($result as $row){//display product cards
    $img=$row["image"];

// echo $row["bname"] ,"  ",$row["pname"]," <img src='products/$img' height='200px' width='200px'>";
// <img src='products/$img' height='200px' width='200px'>

echo "<div class='card w-96 transition ease-in-out delay-150 hover:scale-105 bg-porcelain-500 m-5 shadow-xl '>
<figure>
<a href='product.php?id=",$row['id'],"'>
<img src='products/$img' class='transition ease-in-out delay-150 duration-500 hover:rotate-12 z-0 hover:scale-125' height='200px' width='200px'>
</a>
</figure>
<div class='card-body'>
  <h2 class='card-title z-20'> ",$row['pname'],"</h2>
  <p>   ₹ ",$row['price'],"</p>
  <div class='card-actions justify-end'>
  <form method='POST'>
  <button type='submit' value='",$row['id'],"'  class='btn btn-secondary  transition ease-in-out delay-150 hover:scale-105' name='ATC' >Add to Cart</button>
  </form>
  <a href='product.php?id=",$row['id'],"'><button class='btn btn-primary  transition ease-in-out delay-150 hover:scale-105'>Buy Now</button></a>
  </div>
</div>
</div>";
}
if(isset($_POST['ATC']))//cart system
{
  $cid=$_POST["ATC"];
  $sql="SELECT * FROM cart WHERE user_id=$uid and product_id=$cid";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
  if($count==0)
  {
  $sql="INSERT INTO `cart`(`user_id`, `product_id`) VALUES ('$uid','$cid')";
  mysqli_query($conn,$sql);
  $_SESSION['count']++;
  }
  else
  {
    $sql="UPDATE cart set nos=nos+1 WHERE user_id=$uid AND product_id=$cid";
  mysqli_query($conn,$sql);
  $_SESSION['count']++;
  }
  echo '<script> window.location = "shop.php";</script>';
}
echo "</div>";
?>