<?php
include("include/connect.php");
include("include/session.php");
include("include/cart.php");
$uid=$_SESSION["uid"];
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
    <script>
        function redirect(oid) {
            window.location.href = "user_order.php?oid="+oid;
}
    </script>
</head>

<body>
    <div class="navbar flex justify-between flex-row bg-sun-50 h-16 rounded-full m-2 top-2 sticky w-auto z-50">
        <div class="flex-1">
            <a href="shop.php" class="btn btn-ghost normal-case text-xl"><img src="./images/LoGo2.png" width="150" height="150" alt="logo"></a>
        </div>

        <div class="form-control">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" placeholder="Search…" name="search" class="input input-bordered" />
                    <button class="btn btn-square">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <div class="flex-none">
            <div class="dropdown dropdown-end">
            <?php include("include/cart_drop.php"); ?>    

<form method="post" class="card-actions">
<button class="btn btn-primary btn-block" name="checkout">Checkout</button>
    <button class="btn btn-secondary btn-block" name="clear_cart">Clear cart</button>
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
                <li><a href="profile.php">Profile</a></li>
        <li><a href="feedback.php">Feedback</a></li>
        <li><a href="list_user_orders.php">Orders</a></li>
        <li><a href="include/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="container" class="main flex flex-row pt-1 pr-5 pl-5 mt-1">
        <div class=" bg-porcelain-500 rounded-2xl w-full m-4  p-5">
          <?php
          $total=0;
          $sql="SELECT * FROM orders where user_id=$uid";
          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($result);
          $count = mysqli_num_rows($result);
          if($count>0)
          {
          echo "<div class='overflow-x-auto -z-15'>
          <table class='table table-zebra w-full z-10'>
            <!-- head -->
            <thead class='text-center'>
              <tr>
                <th>ORDER ID</th>  
                <th>STATUS</th>
                <th>ADDRESS</th>
                <th>ORDER TIME</th>
                <th>PRODUCTS</th>
              </tr>
            </thead>";
          foreach ($result as $row) {
            if($row["status"]==0)
            $sts="ORDER PLACED";
            elseif($row["status"]==1)
            $sts="ORDER SHIPPED";
            elseif($row["status"]==2)
            $sts="DELIVERED SUCCESSFULLY";
            elseif($row["status"]==3)
            $sts="ORDER CANCELLED";
              $pid=$row["order_id"];
              $products=json_decode($row["products"]);
              $oid=$row['order_id'];

              echo 
              "<tbody class='text-center'>
                <tr class='hover' onclick='redirect($oid)'>
                  <td>",$row["order_id"],"</td>
                  <td>",$sts,"</td>
                  <td>",$row["address"],"</td>
                  <td>",$row["order_time"],"</td>
                  <td class=' text-start'>";
                  foreach ($products as $key => $value)
                  {
                  
                      $sql="SELECT * FROM products WHERE id='$key'";
                      $result=mysqli_query($conn,$sql);
                      $row1=mysqli_fetch_assoc($result);
                      $name=$row1["pname"];  
                      $price=$row1["price"];
                      $price=(int)$price;
                      $total+=$price;
                      echo '<h2 class=" text-base text-dblue-300 truncate">.&ensp;',strtoupper($name),'&ensp;<span class="badge badge-md ">',$value,'</span></h2>&ensp;';
                  }
          
          
                //  echo "Net Price: ₹",$total,'.00';
                  echo "</td>   
                </tr>
    
                ";
          }
          echo "    </tbody>
          </table>
          </div>
          </div>";
        }
        else
        {
            echo"<center><h1 class='font-extrabold  text-2xl'>NO ORDERS FOUND</h1></center>";
        }
          ?>
        </div>
    </div>

    <?php
    
    ?>
</body>

</html>
