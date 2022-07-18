<?php
include("connect.php");
  // Create database connection
  $target_dir="products/";
  $status=2;
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
      // Get image name
      $image = $_FILES['image']['name'];
      // Get text
      $pn = mysqli_real_escape_string($conn,$_POST['pname']);
      $bn = mysqli_real_escape_string($conn,$_POST['bname']);
      $pd = mysqli_real_escape_string($conn,$_POST['pdesc']);
      $off= mysqli_real_escape_string($conn,$_POST['off']);
      $pr =  mysqli_real_escape_string($conn,$_POST['price']);
      // image file directory
     
      $target = $target_dir.basename($image);

      $sql = "INSERT INTO `products`(`bname`,`pname`, `pdesc`, `price`, `offer`, `image`) VALUES ('$bn','$pn','$pd','$pr','$off','$image')";
      // execute query
      

      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        mysqli_query($conn, $sql);
        $status=1;
         
      } else {
        $status=0;
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
    #hide{
        animation: hideAnimation 0s ease-in 5s;
        animation-fill-mode: forwards;
      }
      
      @keyframes hideAnimation {
        to {
          visibility: hidden;
          width: 0px;
          height: 0px;
        }
      }
      </style>
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
        <a href="index.php">Logout</a>
      </ul>
    </div>
</div>
<?php 
    if($status==1)
    {
        echo '<div id="hide" class="alert alert-success shadow-lg max-w-54
         m-2">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>Image has been uploaded succesfully</span>
        </div>
      </div>';
    }
    elseif($status==0)
    {
        echo '<div id="hide" class="alert alert-error shadow-lg max-w-5 m-2">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>Error! Failed to upload image.</span>
        </div>
      </div>';
    }

    ?>
    <div class=" bg-mercury-500 rounded-lg max-w-5 m-2">
    <div class="flex flex-col flex-wrap items-center  m-1 mb-6 md:mb-8">
        <form action="" method="post" enctype="multipart/form-data">
           <h1>Add new product</h1><br>
            Brand name <br>
            <input class="input input-bordered w-96 m-2" type="text" name="bname" placeholder="brand name"><br>
            Product name <br>
            <input class="input input-bordered w-96 m-2" type="text" name="pname" placeholder="product name"><br>
            Product description <br>
            <input class="input input-bordered w-96 m-2" type="text" name="pdesc" placeholder="description"><br>
            Price <br>
            <input class="input input-bordered w-96 m-2" type="text" name="price" placeholder="price"><br>
            Offer percentage <br>
            <input class="input input-bordered w-96 m-2" type="text" name="off" placeholder="discount percentage"><br>
            Upload product photo <br>
            <input class="hidden" id="file-upload" type="file" name="image" value="shoe image">
            <label for="file-upload" class="btn btn-accent m-2">Upload image</label> <br>
            <input type="submit" name="upload" class="btn btn-primary" value="submit"><br>
   
        </form>
    </div>
    </div>
<!-- Page content here -->
    
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