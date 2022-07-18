<?php
include("connect.php");
$pid=$_GET['id'];
$sql="SELECT * FROM products WHERE id='$pid'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo 'NAME ',$row["pname"];
echo 'description ',$row["pdesc"];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body  class="bg-porcelain-500">
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


        </div>
        <div>
        <img src='products/<?php echo $row["image"]?>' height='400px' width='400px'>   
        <h1 class="text-sm font-sans"><?php echo $row["pdesc"]?></h1>
        </div>
    </body>
</html>
