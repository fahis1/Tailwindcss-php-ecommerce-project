<?php
include("../include/connect.php");
include("../include/admin_session.php");
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
      *{
        font-family: 'Inter', sans-serif;
      }
      </style>
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class="bg-white">
<div class="drawer"> 
  <input id="my-drawer" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content">
    <!-- page content here -->
    <div class="navbar bg-sun-500 h-16 rounded-full m-2 top-2 w-auto">
  <div class="flex-none">
  <label for="my-drawer" class="btn btn-ghost drawer-button"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></label>
  </div>
  <div class="flex-1">
    <a class="btn btn-ghost normal-case text-xl"><img src="../images/LoGo2.png" width="150" height="150" alt="logo"></a>
  </div>
  <div class="dropdown dropdown-end z-50">
      <label tabindex="0" class="btn btn-ghost btn-circle avatar">
        <div class="w-5 ">
          <img src="../images/logout.png" />
        </div>
      </label>
      <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
      <li><a href="../include/logout.php">Logout</a></li>
      </ul>
    </div>
</div>
<div class=" bg-mercury-500 rounded-lg m-2 p-2 flex flex-wrap sticky z-10">
<div class="navbar">


<div class="flex-1 gap-1">
<button class="btn bg-dblue-500 text-white"><a href="add_products.php"><h2>Add new product +</h2></a></button>
<label for='edit' class='btn bg-dblue-500 text-white modal-button'>Edit Product</label>
<label for='delete' class='btn bg-dblue-500 text-white modal-button'>Delete product</label>
</div>
<div class="flex-none gap-2">
  <form action="" method="POST">
        <div class=" input-group">
        <input type="text" placeholder="Search…" name="Search" class="input input-bordered" />
        <button class="btn btn-square bg-dblue-500 " name="Sbtn">
        <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
        </button>
</div>
  </form>
</div>

</div>
</div>
<div class=" bg-mercury-500 rounded-lg m-2 p-2 ">
    
<?php 
include("../include/connect.php");
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
        echo "<div class='alert alert-warning shadow-lg  z-10'>
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
        <td><img src='../products/$img' class='border-double rounded-lg border-4 border-dblue-500' height='300px' width='300px'></td>
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
      <li><a href="dashboard.php">DASHBOARD</a></li>
      <li><a href="add_products.php">ADD PRODUCTS</a></li>
      <li><a href="list_products.php">PRODUCTS</a></li>
      <li><a href="list_users.php">USERS</a></li>
      <li><a href="orders.php">ORDERS</a></li>
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
 include ('../include/connect.php');
 if (isset($_POST['continue']))
 {
 $pid=$_POST["pid"];
 header("Location: add_products.php?pid=,$pid,");
 }
 if (isset($_POST['del']))
  {
    $id=$_POST['id'];
    $sql="select * from products where id='$id'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
          $row=mysqli_fetch_assoc($result);
          
          if($count>0)
    	{
        $sql="delete from products where id='$id'";
        mysqli_query($conn,$sql);
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
        echo '<script> setTimeout(function() { window.location = "list_products.php"; }, 2000); </script>';
        echo "<div class='alert alert-error shadow-lg absolute top-3 z-10'>
        <div>
          <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
          <span>Product not found in database!</span>
        </div>
      </div>";
      }
  }	
  ?>
<?php
if (isset($_POST['continue']))
  {
    echo '<script>window.location = "edit_products.php?id=',$pid,'";</script>';
  }
  ?>