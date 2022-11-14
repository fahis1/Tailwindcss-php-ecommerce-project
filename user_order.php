<?php
include("include/connect.php");
include("include/session.php");
$uid=$_SESSION["uid"];
$oid=$_GET['oid'];
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
            window.location.href = "user_order?oid="+oid;
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
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </label>
                <div tabindex="0" class="mt-3 card card-compact dropdown-content w-max bg-base-100 shadow">
                    <div class="card-body">
                        <form method="post" class="card-actions">
                            <button class="btn btn-primary btn-block">View cart</button>
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
    <div id="container" class="main flex flex-row pt-1 pr-5 pl-5 mt-1 max-h-full">
    <div class=" bg-porcelain-500 rounded-2xl w-1/4 m-4 p-5 top-24 h-full sticky">
        <?php
        $sql="SELECT * FROM orders where order_id=$oid";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
       
        foreach ($result as $row) {
          if($row["status"]==0)
          {echo "<ul class='steps steps-vertical'>
            <li class='step step-primary'>Order placed</li>
            <li class='step'>Order shipped</li>
            <li class='step'>Out for delivery</li>
            <li class='step'>Order delivered</li>
              </ul>";}

          elseif($row["status"]==1)
          {echo "<ul class='steps steps-vertical'>
            <li class='step step-primary'>Order placed</li>
            <li class='step step-primary'>Order shipped</li>
            <li class='step'>Out for delivery</li>
            <li class='step'>Order delivered</li>
              </ul>";}
   
          elseif($row["status"]==2)
          {echo "<ul class='steps steps-vertical'>
            <li class='step step-primary'>Order placed</li>
            <li class='step step-primary'>Order shipped</li>
            <li class='step step-primary'>Out for delivery</li>
            <li class='step step-primary'>Order delivered</li>
              </ul>";}

          elseif($row["status"]==3)
          {echo "<ul class='steps steps-vertical'>
            <li class='step step-error'>Order placed</li>
            <li class='step step-error'>Order shipped</li>
            <li class='step step-error'>Out for delivery</li>
            <li class='step step-error'><b>Order is cancelled</b></li>
              </ul>";}

        }
?>

</div>
        <div class=" bg-porcelain-500 rounded-2xl w-full m-4  p-5">
          <?php
          $total=0;
          $sql="SELECT * FROM orders where order_id=$oid";
          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($result);
          echo"<center><h1 class='font-semibold underline text-2xl'>Order details</h1></center><br><br>";
          echo"<h1 class=' font-medium text-xl'>Products:</h1>";
          foreach ($result as $row) {
              $pid=$row["order_id"];
              $products=json_decode($row["products"]);
              $oid=$row['order_id'];

                  foreach ($products as $key => $value)
                  {
                  
                      $sql="SELECT * FROM products WHERE id='$key'";
                      $result=mysqli_query($conn,$sql);
                      $row1=mysqli_fetch_assoc($result);
                      $name=$row1["pname"];  
                      $img=$row1["image"];
                      $price=$row1["price"];
                      $price=(int)$price;
                      $total+=$price*$value ;
                      $unit_price=$price*$value;
                      echo '<div class="m-6 p-6 flex flex-row border-2 border-dblue-500 bg-porcelain-500 rounded-2xl">
<img src="products/'.$img.'" class="border-double  rounded-lg " height="180px" width="180px">
<div class=" w-full">
<h2 class=" text-4xl font-semibold text-dblue-300 truncate">
    &ensp;&ensp;',strtoupper($name),'&ensp;&ensp;
  </h2>
  <h3 class=" ml-12 mt-3 text-xl text-dblue-300 truncate">
  Quantity:&ensp;<span class="badge badge-md ">',$value,'</span>
  </h3>
    <div class="flex h-20 justify-end items-end">
    <p class="flex justify-end items-end text-xl mr-5 font-bold">Net Unit Price:<p class=" text-3xl font-mono"> ₹ ',$unit_price,'.00</p></p>
    </div>
    </div> 
</div>
                      ';
                    $unit_price=0;
                    }
          
          
                 echo "<div class='flex justify-between'>
                 <span>
                 <form action='' method='post'>
                 <button name='cancel' class='ml-8 btn btn-outline btn-accent'>Cancel order</button>
                 </form>
                 </span>
                 <span class='text-3xl flex font-bold mr-8'>Net Price: ₹",$total,'.00</span>
                 </div>';
          }
          echo "    </tbody>
          </table>
          </div>
          </div>";
          ?>
        </div>
    </div>

    <?php
if(isset($_POST["cancel"]))
{
    $sql="DELETE FROM orders WHERE order_id=$oid;";
    mysqli_query($conn,$sql);
    echo "<script>
    setTimeout(function(){
          window.location.href = 'list_user_orders.php';
       }, 500);
  </script>";
}
    ?>
</body>

</html>
