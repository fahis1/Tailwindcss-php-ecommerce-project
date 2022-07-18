<?php
include("connect.php");
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body class="bg-white">
<div class="drawer"> 
  <input id="my-drawer" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content">
  <div class="navbar bg-sun-500 h-16 rounded-full m-1 mt-5 mb-5 w-auto">
  <div class="flex-none">
  <label for="my-drawer" class="btn btn-ghost drawer-button"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></label>
  </div>
  <div class="flex-1">
    <a class="btn btn-ghost normal-case text-xl">Sneaker avenue</a><span><img src="images/LoGo2.png" height="80px" width="80px"></span>
  </div>
  <div class="dropdown dropdown-end">
      <label tabindex="0" class="btn btn-ghost btn-circle avatar">
        <div class="w-5 ">
          <img src="images/logout.png" />
        </div>
      </label>
      <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
        <li><a href="index.php">Logout</a></li>
      </ul>
    </div>
</div>
<div class=" bg-mercury-500 rounded-lg max-w-5 m-2">
   <button class="btn bg-dblue-500 text-white"><a href="add_products.php"><h2>Add new product +</h2></a></button>

<!-- Page content here -->
<?php 
include("connect.php");
$sql="SELECT * FROM products";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo "<div class='overflow-x-auto'>
<table class='table table-zebra w-full'>
  <!-- head -->
  <thead class='text-center'>
    <tr>
      <th>Id</th>
      <th>Brand name</th>
      <th>Product name</th>
      <th>price</th>
      <th>description</th>
      <th>Image</th>
    </tr>
  </thead>";
foreach ($result as $row) {
    $img=$row["image"];
    echo 
    "<tbody class='text-center'>
      <tr class='hover'>
        <th>",$row["id"],"</th>
        <td>",$row["bname"],"</td>
        <td>",$row["pname"],"</td>
        <td>",$row["price"],"</td>
        <td class='max-w-lg whitespace-pre-line'>",$row["pdesc"],"</td>
        <td><img src='products/$img' height='300px' width='300px'></td>
      </tr>";
}
echo "    </tbody>
</table>
</div>
</div>";
?>
  </div>  
  <div class="drawer-side">
    <label for="my-drawer" class="drawer-overlay"></label>
    <ul class="menu p-4 overflow-y-auto w-80 bg-dblue-300 text-white">
      <!-- Sidebar content here -->
      <li><a href="add_products.php">add products</a></li>
      <li><a href="list_products.php">View products</a></li>
      <li><a href="list_users.php">Users</a></li>
      
    </ul>
  </div>
</div>

</body>
</html>