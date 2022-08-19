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
  <div class="navbar bg-sun-500 h-16 rounded-full m-2 top-2 w-auto">
  <div class="flex-none">
  <label for="my-drawer" class="btn btn-ghost drawer-button"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></label>
  </div>
  <div class="flex-1">
    <a class="btn btn-ghost normal-case text-xl" href="../homepage.php"><img src="../images/LoGo2.png" width="150" height="150" alt="logo"></a>
  </div>
  <div class="dropdown dropdown-end">
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

<div class=" bg-mercury-500 rounded-lg max-w-5 m-2 p-2">

<!-- Page content here -->
<?php 
include("../include/connect.php");
$sql="SELECT * FROM acc";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo "<div class='overflow-x-auto'>
<table class='table table-zebra w-full'>
  <!-- head -->
  <thead class='text-center'>
    <tr>
      <th>Id</th>
      <th>User name</th>
      <th>E-mail</th>
      <th>admin</th>
      <th></th>
    </tr>
  </thead>";
foreach ($result as $row) {
  $pid=$row["id"];
    echo 
    "<tbody class='text-center'>
      <tr class='hover'>
        <th>",$row["id"],"</th>
        <td>",$row["name"],"</td>
        <td>",$row["email"],"</td>
        <td>",$row["admin"],"</td>
        <td><label for='admin' class='btn btn-secondary mr-3' name='admin'>Make admin</label><label for='my-modal' class='btn modal-button'>Delete</label>
        </td>
      </tr>
      ";
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
<input type='checkbox' id='my-modal' class='modal-toggle' />
      <div class='modal'>
      <div class='modal-box '>
        <h3 class='font-bold text-lg '>Are you sure!</h3>
        <p class='py-4'>Once you delete a user account you can not get the data back!</p>
        <div class='modal-action items-center flex flex-col justify-center'>
          <form action='' method='post'>
          <input class='input input-bordered mb-3 w-full max-w-xs' type='number' name='id' placeholder="Confirm account id"><br>
          <label for='my-modal' class='btn mt-1  mr-20'>Cancel</label><button class='btn mt-1 ml-12s' type='submit' name='del'>Delete</button>
        </form>
        </div>
      </div>
    </div>

    <input type='checkbox' id='admin' class='modal-toggle' />
      <div class='modal'>
      <div class='modal-box '>
        <h3 class='font-bold text-lg '>Are you sure!</h3>
        <p class='py-4'>Admins can access the admin dashboard and will not have any restriction !</p>
        <div class='modal-action items-center flex flex-col justify-center'>
          <form action='' method='post'>
          <input class='input input-bordered mb-3 w-full max-w-xs' type='number' name='id' placeholder="Confirm account id"><br>
          <label for='admin' class='btn mt-1  mr-20'>Cancel</label><button class='btn mt-1 ml-12s' type='submit' name='admin'>continue</button>
        </form>
        </div>
      </div>
    </div>

</body>
</html>
<?php 
if (isset($_POST["del"]))
{
  $id=$_POST['id'];
  $sql="DELETE FROM acc where id='$id'";
  if(mysqli_query($conn,$sql))
  {
    echo '<script> setTimeout(function() { window.location = "list_users.php"; }, 2000); </script>';
    echo "<div class='alert alert-success shadow-lg absolute top-3 z-10'>
    <div>
      <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
      <span>Account has been deleted!</span>
    </div>
  </div>";
  
  }
  else {
    header("Refresh:2");
    echo "<div class='alert alert-error shadow-lg absolute top-3 z-10'>
    <div>
      <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
      <span>Account ID not found !</span>
    </div>
  </div>";
  }
}
?>
<?php 
if (isset($_POST["admin"]))
{
  $id=$_POST['id'];
  $sql="UPDATE acc SET admin='1' where id='$id'";
  if(mysqli_query($conn,$sql))
  {
    echo '<script> setTimeout(function() { window.location = "list_users.php"; }, 2000); </script>';
    echo "<div class='alert alert-success shadow-lg absolute top-3 z-10'>
    <div>
      <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
      <span>Account has admin permissions now!</span>
    </div>
  </div>";
  
  }
  else {
    header("Refresh:2");
    echo "<div class='alert alert-error shadow-lg absolute top-3 z-10'>
    <div>
      <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
      <span>Account ID not found !</span>
    </div>
  </div>";
  }
}
?>