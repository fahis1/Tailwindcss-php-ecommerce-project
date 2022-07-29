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
    <form action="" method="post">
      <input type="text" class="" name="Search" placeholder="search">
      <button type="submit" name="Sbtn">Search</button>
    </form>
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
<div class=" bg-mercury-500 rounded-lg max-w-5 m-2 p-2">
<div>

   <button class="btn bg-dblue-500 text-white"><a href="add_products.php"><h2>Add new product +</h2></a></button>
   <label for='edit' class='btn bg-dblue-500 text-white modal-button'>Edit Product</label>
   <label for='delete' class='btn bg-dblue-500 text-white modal-button'>Delete product</label>
   <div class=" input-group">
    <input type="text" class="input" name="search">
    </div>
</div>

<!-- Page content here -->
<?php 
include("connect.php");
if(isset($_POST['Sbtn']))
        {
          $filtervalues=$_POST['Search'];
          $sql="SELECT * FROM products WHERE CONCAT(id,bname,pname) LIKE '%$filtervalues%'";
          $result=mysqli_query($conn,$sql);
          $count=mysqli_num_rows($result);
          $row=mysqli_fetch_assoc($result);
          if($count==0)
          {
            echo '<script> setTimeout(function() { window.location = "list_products.php"; }, 2500); </script>';
        echo "<div class='alert alert-error shadow-lg absolute top-3 z-10'>
        <div>
          <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
          <span>Product not found in database!</span>
        </div>
      </div>";
            exit();
          }
          echo "<div class='overflow-x-auto mt-2'>
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
        <td><img src='products/$img' class='border-double rounded-lg border-4 border-dblue-500' height='300px' width='300px'></td>
      </tr>";
          }
        }
           else 
           {
                      echo "<div class='overflow-x-auto mt-2'>
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
            $sql="SELECT * FROM products";
          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($result);
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
        <td><img src='products/$img' class='border-double rounded-lg border-4 border-dblue-500' height='300px' width='300px'></td>
      </tr>";
           }

}
echo "    </tbody>
</table>
</div>
</div>";
?>
  </div>  
  <div class="drawer-side">
    <label for="my-drawer" class="drawer-overlay"></label>
    <ul class="menu p-4 overflow-y-auto w-80 bg-dblue-200 text-white">
      <!-- Sidebar content here -->
      <li><a href="add_products.php">add products</a></li>
      <li><a href="list_products.php">View products</a></li>
      <li><a href="list_users.php">Users</a></li>
      
    </ul>
  </div>
</div>
<input type='checkbox' id='delete' class='modal-toggle' />
      <div class='modal'>
      <div class='modal-box '>
        <h3 class=' text-lg font-black '>Are you sure!</h3>
        <p class='pt-4 font-bold text-error'>Once you delete a product it cannot be undone !</p>
        <p class=' font-medium '>confirm deletion by entering the id of the product to delete</p>
        <div class='modal-action items-center flex flex-col justify-center'>
          <form action='' method='post'>
          <input class='input input-bordered mb-3 w-full max-w-xs' type='number' name='id' placeholder="Enter account id"><br>
          <label for='delete' class='btn mt-1  mr-20'>Cancel</label><button class='btn mt-1 ml-12s' type='submit' name='del'>Delete</button>
        </form>
        </div>
      </div>
    </div>
<input type='checkbox' id='edit' class='modal-toggle' />
      <div class='modal'>
      <div class='modal-box '>
        <h3 class='text-lg font-black '>Edit product!</h3>
        <p class='pt-4 font-medium'>Enter id of the product to edit</p>
        <div class='modal-action items-center flex flex-col justify-center'>
          <form action='' method='post'>
          <input class='input input-bordered mb-3 w-full max-w-xs' type='number' name='pid' placeholder="Enter product id"><br>
          <label for='edit' class='btn mt-1  mr-20'>Cancel</label> <button class='btn mt-1 ml-12s' type='submit' name='continue'>Continue</button>
          </form>

        </div>
      </div>
    </div>
</body>
</html>


<?php 
 include ('connect.php');
 if (isset($_POST['continue']))
 {
 $pid=$_POST["pid"];
 header("Location: add_products.php?pid=,$pid,");
 }
 if (isset($_POST['del']))
  {
    $id=$_POST['id'];
    $sql="delete from products where id='$id'";
    if(mysqli_query($conn,$sql))
      {
        echo '<script> setTimeout(function() { window.location = "list_products.php"; }, 2000); </script>';
        echo "<div class='alert alert-success shadow-lg absolute top-3 z-10'>
        <div>
          <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
          <span>Product details has been deleted Successfully!</span>
        </div>
      </div>";
        }
     else
      {
        header("Refresh:2");
        echo "<div class='alert alert-error shadow-lg absolute top-3 z-10'>
        <div>
          <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
          <span>Product not found in database!</span>
        </div>
      </div>";
      }
  } 
  ?>