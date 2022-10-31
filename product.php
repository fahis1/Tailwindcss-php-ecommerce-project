<?php
include("include/connect.php");
include("include/cart.php");
$pid=$_GET['id'];
include("include/connect.php");
$sql="SELECT * FROM products WHERE id='$pid'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
// if(isset($_POST['ATC']))
// {
//   $cid=$_POST["ATC"];
//   $sql="SELECT * FROM cart WHERE user_id=$uid and product_id=$cid";
//   $result = mysqli_query($conn, $sql);
//   $count = mysqli_num_rows($result);
//   if($count==0)
//   {
//   $sql="INSERT INTO `cart`(`user_id`, `product_id`) VALUES ('$uid','$cid')";
//   mysqli_query($conn,$sql);

//   }
//   else
//   {
//     $sql="UPDATE cart set nos=nos+1 WHERE user_id=$uid AND product_id=$cid";
//   mysqli_query($conn,$sql);
//   $_SESSION['count']++;
//   }

//   header("location:product.php?id=$pid");
//   //product.php?id=',$row['id'],'
//   //echo '<script> window.location = "shop.php";</script>';
// }
?>
<!DOCTYPE html>
<html class="bg-sun-300">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body >
    <div class="navbar flex justify-between flex-row bg-sun-50 h-16 rounded-full m-2 top-2 sticky w-auto z-50">
  <div class="flex-1">
    <a href="shop.php" class="btn btn-ghost normal-case text-xl"><img src="./images/LoGo2.png" width="150" height="150" alt="logo"></a>
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
    $total+=$price;
    
}  
echo "<span class='text-info text-base'>Subtotal: ₹",$total,"</span>";
$sql="SELECT * FROM products WHERE id='$pid'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
      ?>
          <form method="post" class="card-actions">
            <button class="btn btn-primary btn-block">View cart</button>
            <button class="btn btn-secondary btn-block"  name="clear_cart">Clear cart</button>
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
        <li>
          <a class="justify-between">
            Profile
            <span class="badge">New</span>
          </a>
        </li>
        <li><a>Settings</a></li>
        <li><a href="include/logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="main flex flex-row pt-1  pr-5 pl-5 ">

        <div class="pd bg-porcelain-500 rounded-2xl w-3/4 m-4 p-5">
        <img src='products/<?php echo $row["image"]?>'class='ml-auto mr-auto' height='500px' width='500px'>   
        <!-- <img src='products/<?php echo $row["image2"]?>'class='border-double rounded-3xl border-4 border-dblue-500' height='300px' width='300px'>   
        <img src='products/<?php echo $row["image3"]?>'class='border-double rounded-3xl border-4 border-dblue-500' height='300px' width='300px'>    -->
        <h1 class="text-sm font-sans"><?php echo $row["pdesc"]?></h1>
        </div>
        <div class="pd page bg-porcelain-500 rounded-2xl w-1/4 p-5 m-4 ">
        <div>
        <h1 class="text-xl font-sans uppercase"><?php echo $row["bname"]?></h1>
        <h1 class="text-4xl font-mono uppercase"><?php echo $row["pname"]?></h1>
        <h1 class="text-2xl font-mono">MRP: <?php echo '₹',$row["price"]?></h1>
<div class="rating">
  <input type="radio" name="rating-2" class="mask mask-star-2 bg-sun-400" />
  <input type="radio" name="rating-2" class="mask mask-star-2 bg-sun-400" checked />
  <input type="radio" name="rating-2" class="mask mask-star-2 bg-sun-400" />
  <input type="radio" name="rating-2" class="mask mask-star-2 bg-sun-400" />
  <input type="radio" name="rating-2" class="mask mask-star-2 bg-sun-400" />
</div>
<?php 
echo "<div class=''>
<form method='post'>
  <button type='submit' value='",$row['id'],"' class='btn btn-secondary  transition ease-in-out delay-150 hover:scale-105' name='ATC' >Add to Cart</button>
  </form>
   <a hef='product.php?id=",$row['id'],"'><button class='btn btn-primary  transition ease-in-out delay-150 hover:scale-105'>Buy Now</button></a>
  </div>";

  ?>
</div>

        </div>
</div>
    </body>
</html>
