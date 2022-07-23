
<!DOCTYPE html>
<html lang="en" class="bg-sun-300">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
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

<div class="navbar flex justify-between flex-row bg-sun-50 h-16 rounded-full m-2 top-2 sticky w-auto
 z-50">
  <div class="flex-1">
    <a href="homepage.php" class="btn btn-ghost normal-case text-xl"><img src="./images/LoGo2.png" width="150" height="150" alt="logo"></a>
  </div>

    <div class="form-control">
      <form action="" method="post">
      <!-- <input type="text" placeholder="Search" name="search" class="input input-bordered" /> -->
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
          <span class="badge badge-sm indicator-item">8</span>
        </div>
      </label>
      <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
        <div class="card-body">
          <span class="font-bold text-lg">8 Items</span>
          <span class="text-info">Subtotal: $999</span>
          <div class="card-actions">
            <button class="btn btn-primary btn-block">View cart</button>
          </div>
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
        <li><a href="index.php">Logout</a></li>
      </ul>
    </div>
  </div>
</div>
</body>
</html>
<?php 
include("connect.php");

if (isset($_POST["search"]))
{
  $srch=$_POST["search"];
$sql="SELECT * FROM products where pname like '%$srch%'";
}
else
$sql="SELECT * FROM products";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo "<div class='bg-sun-300 flex flex-wrap  justify-center flex-row'>";
foreach($result as $row){
    $img=$row["image"];
// echo $row["bname"] ,"  ",$row["pname"]," <img src='products/$img' height='200px' width='200px'>";
// <img src='products/$img' height='200px' width='200px'>

echo "<div class='card w-96 transition ease-in-out delay-150 hover:scale-105 bg-porcelain-500 m-5 shadow-xl'>
<figure>
<img src='products/$img' height='200px' width='200px'>
</figure>
<div class='card-body'>
  <h2 class='card-title'> ",$row['pname'],"</h2>
  <p>    ",$row['price'],"</p>
  <div class='card-actions justify-end'>
  <button class='btn btn-secondary  transition ease-in-out delay-150 hover:scale-105'>Add to Cart</button>
  <a href='product.php?id=",$row['id'],"'><button class='btn btn-primary  transition ease-in-out delay-150 hover:scale-105'>Buy Now</button></a>
  </div>
</div>
</div>";
}
echo "</div>";
?>
