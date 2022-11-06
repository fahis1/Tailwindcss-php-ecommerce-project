<?php
include("include/connect.php");
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
</head>

<body>
    <div class="navbar flex justify-between flex-row bg-sun-50 h-16 rounded-full m-2 top-2 sticky w-auto z-5">
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
                    <li>
                        <a class="justify-between">
                            Profile
                            <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li><a href="include/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="container" class="main flex flex-row pt-1 pr-5 pl-5 mt-1">
        <div class=" bg-porcelain-100 rounded-2xl w-full m-4  p-5">
            <form action="" method="POST">
                <div>
                    <span class="text-3xl font-medium w-full ">
                        <center> Add Address</center>
                    </span>
                </div>
                <div class=" text-center mt-10">
                    <span class="font-medium">
                        <h3>Contact Info</h3>
                    </span>
                    <input type="text" required name="name" placeholder="Name" class="input w-full max-w-xs m-2"><br>
                    <input type="number" required min="1000000000" max="9999999999" name="number" placeholder="Number" class="input w-full max-w-xs m-2"><br><br>
                    <h4 class="font-medium underline"> Address info </h4>
                    <input type="text" required name="pincode" placeholder="Pincode" class="input w-full max-w-xs m-2"><br>
                    <input type="text" required name="city" placeholder="City" class="input w-full max-w-xs m-2"><br>
                    <input type="text" required name="state" placeholder="State" class="input w-full max-w-xs m-2"><br>
                    <input type="text" required name="area" placeholder="Locality/Area/Street" class="input w-full max-w-xs m-2"><br>
                    <input type="text" required name="building_name" placeholder="Flat no /Building Name" class="input w-full max-w-xs m-2"><br>
                    <input type="text" name="landmark" placeholder="Landmark(optional)" class="input w-full max-w-xs m-2"><br>
                    <span class="pr-52"><input type="checkbox" class="toggle" checked />
                        <label>Make this my default address</label><br><br></span>
                    <label class="font-medium">Address type</label><br><br>
                    <select class="select w-full max-w-xs">
                        <option disable selected>Select an Address Type</option>
                        <option>Home (7am-9pm delivery)</option>
                        <option>Office/commercial (10am-6pm delivery)</option>
                    </select><br><br>
                    <input type="submit" name="save" value="Save Address" class="btn btn-warning mt-4">
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $number = $_POST['number'];
        $pincode = $_POST['pincode'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $area = $_POST['area'];
        $building_name = $_POST['building_name'];
        $landmark = $_POST['landmark'];

        $sql = "insert into address (user_id,name,number,pincode,city,state,area,building_name,landmark) 
      values ('$uid','$name','$number','$pincode','$city','$state','$area','$building_name','$landmark')";
        if (mysqli_query($conn, $sql)) {
            echo '<script> setTimeout(function() { window.location = "add_address1.php"; }, 2000); </script>';
            echo "<div class='alert alert-success shadow-lg absolute top-3 z-15'>
            <div>
              <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
              <span>Address has been added succesfully!</span>
            </div>
          </div>";
        } else {
            header("Refresh:2");
            echo "<div class='alert alert-error shadow-lg absolute top-20 z-15'>
            <div>
              <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
              <span>Erorr !</span>
            </div>
          </div>";
        }
    }
    ?>
</body>

</html>