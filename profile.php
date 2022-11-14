<?php
include("include/connect.php");
include("include/session.php");
include("include/cart.php");

$uid = $_SESSION['uid'];
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
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        *::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        * {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
</head>

<body>
    <div class="navbar flex justify-between flex-row bg-sun-50 h-16 rounded-full m-2 top-2 sticky w-auto z-10">
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
    <div id="container" class="main flex max-h-full flex-row pt-1 pr-5 pl-5 mt-1">
        <div class=" bg-porcelain-100 rounded-2xl w-2/4 h-full m-4 p-5">
            
            <center>
            <h1 class='font-bold underline text-2xl'>Update Profile</h1><br>
                <div class="avatar ring-primary ring-offset-base-100">

                    <div class=" w-40 rounded-full">
                        <img src="https://placeimg.com/192/192/people" />
                    </div>

                </div>
                <?php
                $query = "SELECT * FROM acc WHERE id='$uid'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                foreach ($result as $row) {


                    echo "
                    <form action='' method='POST'>
                    <input type='submit' name='sbt' value='CHANGE' class='btn btn-warning mt-4 -z-10'><br><br>
                    <span class='font-semibold'> Username:</span><input type='text' value='", $row['user_name'], "' name='uname' placeholder='first name' class='input w-full max-w-xs m-2 input-bordered'><br>
                    <span class='font-semibold'> First Name:</span><input type='text' value='", $row['first_name'], "' name='fname' placeholder='first name' class='input w-full max-w-xs m-2 input-bordered'><br>
                    <span class='font-semibold'>Last Name:</span><input type='text' value='", $row['last_name'], "' name='lname' placeholder='last name' class='input w-full max-w-xs m-2 input-bordered'><br>
                    <span class='font-semibold'> Mobile No:</span><input type='text' value='", $row['number'], "' name='num' placeholder='mobile no' class='input w-full max-w-xs m-2 input-bordered'><br>
                    <span class='font-semibold'>Email:&ensp;&ensp;&ensp;&ensp;&ensp;</span><input type='text' value='", $row['email'], "' name='email' placeholder='Email' class='input w-full max-w-xs m-2 input-bordered'><br>
                    <span class='btn btn-warning mt-4'><input type='submit' name='sbt' value='UPDATE DETAILS'></span><br><br>
                </form>";
                }
                if (isset($_POST["sbt"])) {
                    $uname = $_POST["uname"];
                    $fname = $_POST["fname"];
                    $lname = $_POST["lname"];
                    $num = $_POST["num"];
                    $email = $_POST["email"];
                    $sql = "UPDATE acc set user_name='$uname',  first_name='$fname', last_name='$lname', email='$email', number='$num' where id=$uid";

                    if (mysqli_query($conn, $sql)) {
                        echo '<script> setTimeout(function() { window.location = "profile.php"; }, 1000); </script>';
                        echo "<div class='alert alert-success left-3 w-fit shadow-lg absolute top-3 z-10'>
                        <div>
                          <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
                        <span>Profile updated</span>
                      </div>
                    </div>";
                    } else {
                        
                        echo "<div class='alert alert-error left-3 w-fit shadow-lg absolute top-3 z-10'>
                      <div>
                        <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
                        <span>Error</span>
                      </div>
                    </div>";
                    echo '<script> setTimeout(function() { window.location = "profile.php"; }, 1000); </script>';
                    }
                }
                echo "<div class=' bg-sun-50 rounded-2xl p-5'>
                <h1 class='font-semibold underline text-xl'>Update Password</h1><br>
                <form action='' method='POST'>
                    <span class='font-semibold'>Enter existing password:</span><input type='password'  name='epass' placeholder='Existing password ' class='input w-full max-w-xs m-2 input-bordered'><br>
                    <span class='font-semibold'>Enter new password:&ensp;&ensp;&ensp;</span><input type='password' name='npass' placeholder='New password' class='input w-full max-w-xs m-2 input-bordered'><br>
                    <span class='btn btn-warning mt-4'><input type='submit' name='psbt' value='UPDATE PASSWORD'></span>
                </form>
                <div>";
                if (isset($_POST["psbt"])) {
                    $epass = $_POST["epass"];
                    $npass = $_POST["npass"];
                    $query = "SELECT * FROM acc WHERE id='$uid'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    $dpass= $row['password'];
                    if($dpass==$epass){
                    $sql = "UPDATE acc set password='$npass' where id=$uid";

                    mysqli_query($conn, $sql);
                        echo '<script> setTimeout(function() { window.location = "profile.php"; }, 1500); </script>';
                        echo "<div class='alert alert-success shadow-lg absolute left-3 w-fit top-3 z-10'>
                        <div>
                          <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
                        <span>Password updated succesfully</span>
                      </div>
                    </div>";
                    }
                    else {
                        echo '<script> setTimeout(function() { window.location = "profile.php"; }, 1500); </script>';
                        echo "<div class='alert alert-error shadow-lg absolute left-3 w-fit top-3 z-10'>
                      <div>
                        <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 w-6 h-6 ' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
                        <span>Incorrect Password entered</span>
                      </div>
                    </div>";
                    }
                }
                ?>
            </center>
        </div>
        <div class=" bg-porcelain-100 rounded-2xl w-2/4  h-full m-4  p-5">
            <center>
                <h2 class="text-2xl font-bold underline">Address</h2><br><br>
            </center>
            <div class="flex flex-row items-center justify-center">
                <div class=" items-start">
                    <?php
                    $query = "SELECT * FROM address WHERE user_id='$uid'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    $count = mysqli_num_rows($result);
                    if($count!=0)
                {
                    foreach ($result as $row) {
                        if ($row['type'] == 1) {

                            echo "<h1 class='font-semibold underline text-xl'>Default Address", "</h1>", '<br>',
                            "<h1 class='font-medium'>", $row['name'], "<h1>",
                            $row['building_name'], ',<br>',
                            "<span>", $row['area'], ",</span",
                            $row['landmark'], ',<br>',
                            "<span><br>", $row['city'], ",</span><br>",
                            "<span>", $row['pincode'], ",</span>",
                            $row['state'], ',<br>',
                            "<h1> Phone number: &nbsp;", $row['number'], "<br><br>  <hr>";
                        }
                    }
                    echo " <br>";
                    echo "<h1 class='font-semibold underline text-xl'>Available Addresses</h1><br>";
                    foreach ($result as $row) {
                        if ($row['type'] == 0) {
                            echo "<h1 class='font-medium'>", $row['name'], "<h1>",
                            $row['building_name'], ',<br>',
                            "<span>", $row['area'], ",</span",
                            $row['landmark'], ',<br>',
                            "<span><br>", $row['city'], ",</span><br>",
                            "<span>", $row['pincode'], ",</span>",
                            $row['state'], ',<br>',
                            "<h1> Phone number: &nbsp;", $row['number'], "<br> <br>
                            <a href='default.php?id=", $row['id'], "'> <button class='btn btn-outline btn-accent btn-xs name=add'>Make this my default address</button> <br> <br>
                            <hr> <br></a>";
                        }
                    }
                }
                else
                {
                    echo"<center><h1 class='font-extrabold  text-2xl'>NO ADDRESS FOUND</h1></center><br>";
                }
                    echo "<center><a href='add_address.php'><button class='btn btn-warning btn-sm'>Add new address</button></a></center>";
                
                
                
                    ?>
                </div>

            </div>
        </div>
    </div>



</body>

</html>