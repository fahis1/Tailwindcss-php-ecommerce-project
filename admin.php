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
      $pd = mysqli_real_escape_string($conn,$_POST['pdesc']);
      $off= mysqli_real_escape_string($conn,$_POST['off']);
      $pr =  mysqli_real_escape_string($conn,$_POST['price']);
      // image file directory
     
      $target = $target_dir.basename($image);

      $sql = "INSERT INTO `products`(`pname`, `pdesc`, `price`, `offer`, `image`) VALUES ('$pn','$pd','$pr','$off','$image')";
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
</head>
<body>
    
    <?php 
    if($status==1)
    {
        echo '<div class="alert alert-success shadow-lg">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>Image has been uploaded succesfully</span>
        </div>
      </div>';
    }
    elseif($status==0)
    {
        echo '<div class="alert alert-error shadow-lg">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>Error! Failed to upload image.</span>
        </div>
      </div>';
    }

    ?>
    <div><h1> ADMIN PANEL</h1></div>
    <div class="bg-gradient-to-r from-yellow-400 to-blue-400  flex flex-col items-center justify-center">
    <div class="flex items-center text-lg mb-6 md:mb-8">
        <form action="admin.php" method="post" enctype="multipart/form-data">
            Add new product 
            <input class="form-control" type="text" name="bname" placeholder="brand name">
            <input type="text" name="pname" placeholder="product name">
            <input type="text" name="pdesc" placeholder="description">
            <input type="text" name="price" placeholder="price">
            <input type="text" name="off" placeholder="discount percentage">
            <input type="file" name="image" value="shoe image">
            <input type="submit" name="upload" class="btn btn-primary" value="submit">
   
        </form>
    </div>
    </div>
</body>
</html>
