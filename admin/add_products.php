<?php
include("../include/connect.php");
include("../include/admin_session.php");

  // Create database connection
  $target_dir="../products/";
  $status=2;
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
      // Get image name
      $image = $_FILES['image']['name'][0];
      $image2 = $_FILES['image']['name'][1];
      $image3 = $_FILES['image']['name'][2];
      // Get text
      $pn = mysqli_real_escape_string($conn,$_POST['pname']);
      $bn = mysqli_real_escape_string($conn,$_POST['bname']);
      $pd = mysqli_real_escape_string($conn,$_POST['pdesc']);
      $off= mysqli_real_escape_string($conn,$_POST['off']);
      $pr =  mysqli_real_escape_string($conn,$_POST['price']);
      // image file directory
     
      $target1 = $target_dir.basename($image);
      $target2 = $target_dir.basename($image2);
      $target3 = $target_dir.basename($image3);



      $sql = "INSERT INTO `products`(`bname`,`pname`, `pdesc`, `price`, `offer`, `image`, `image2`, `image3`) VALUES ('$bn','$pn','$pd','$pr','$off','$image','$image2','$image3')";
      // execute query
      
      if (mysqli_query($conn, $sql)) 
      {
        move_uploaded_file($_FILES['image']['tmp_name'][0], $target1);
        move_uploaded_file($_FILES['image']['tmp_name'][1], $target2);
        move_uploaded_file($_FILES['image']['tmp_name'][2], $target3);
        


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
    <link rel="stylesheet" href="../css/main.css">
    <style>
      *{
        font-family: 'Inter', sans-serif;
      }
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
      <script>
        function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}
      </script>
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"> 
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
    <a class="btn btn-ghost normal-case text-xl"><img src="../images/LoGo2.png" width="150" height="150" alt="logo"></a>
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
    <div class=" bg-mercury-500 rounded-lg max-w-5 m-2 p-4">
    <div class="flex flex-row flex-wrap items-center justify-center m-1 mb-6 md:mb-8">
        <form action="" method="post" enctype="multipart/form-data" class=" bg-sun-100 rounded-2xl p-3">
           <h1 class=" font-extrabold underline text-2xl">Add new product</h1><br>
            <h3 class=" font-semibold"> Brand name </h3>
            <input class="input input-bordered w-96 m-2" type="text" name="bname" placeholder="brand name">
            <h3 class=" font-semibold">Product name </h3>
            <input class="input input-bordered w-96 m-2" type="text" name="pname" placeholder="product name">
            <h3 class=" font-semibold">Product description </h3>
            <textarea class='textarea textarea-bordered w-96 max-h-96 h-12 m-2' type='text' name='pdesc' placeholder='product description' oninput='auto_grow(this)' autocomplete='off'></textarea>
            <h3 class=" font-semibold">Price </h3> 
            <input class="input input-bordered w-96 m-2" type="text" name="price" placeholder="price">
            <h3 class=" font-semibold">Offer percentage</h3> 
            <input class="input input-bordered w-96 m-2" type="text" name="off" placeholder="discount percentage">
<br>
            <input class="hidden" id="file-upload" type="file" name="image[]">
            <label for="file-upload" class="btn btn-primary m-2" >Upload thumbnail</label> 
            <input class="hidden" id="file-upload2" type="file" name="image[]">
            <label for="file-upload2" class="btn btn-primary m-2" >Upload image 1</label> <br>
            <input class="hidden" id="file-upload3" type="file" name="image[]">
            <label for="file-upload3" class="btn btn-primary m-2" >Upload image 2</label> 
            <input type="submit" name="upload" class="btn btn-accent" value="submit">
   
        </form>
    </div>
    </div>
<!-- Page content here -->
    
  </div>  
  <div class="drawer-side">
    <label for="my-drawer" class="drawer-overlay"></label>
    <ul class="menu p-4 overflow-y-auto w-80 bg-dblue-300 text-white">
      <!-- Sidebar content here -->
      <li><a href="dashboard.php">DASHBOARD</a></li>
      <li><a href="add_products.php">ADD PRODUCTS</a></li>
      <li><a href="list_products.php">PRODUCTS</a></li>
      <li><a href="list_users.php">USERS</a></li>
      <li><a href="orders.php">ORDERS</a></li>
    </ul>
  </div>
</div>

</body>
</html>

array(1) {
   ["image"]=> array(6) 
   {
     ["name"]=> array(3)  { [0]=> string(8) "img1.jpg" [1]=> string(8) "img2.jpg" [2]=> string(8) "img3.jpg" 
      } 
      ["full_path"]=> array(3)  { [0]=> string(8) "img1.jpg" [1]=> string(8) "img2.jpg" [2]=> string(8) "img3.jpg" 
        } 
        ["type"]=> array(3) { [0]=> string(10) "image/jpeg" [1]=> string(10) "image/jpeg" [2]=> string(10) "image/jpeg" 
        }
         ["tmp_name"]=> array(3) { [0]=> string(24) "C:\xamp2\tmp\phpE2B7.tmp" [1]=> string(24) "C:\xamp2\tmp\phpE2B8.tmp" [2]=> string(24) "C:\xamp2\tmp\phpE2B9.tmp" 
        } 
         ["error"]=> array(3) { [0]=> int(0) [1]=> int(0) [2]=> int(0) 
        } ["size"]=> array(3) { [0]=> int(60663) [1]=> int(79958) [2]=> int(49148) } } } 