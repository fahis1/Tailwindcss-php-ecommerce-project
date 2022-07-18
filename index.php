<?php
include('connect.php');
echo '';
if (isset($_POST['LIbtn'])) {
    $userid=$_POST["fname"];
    $lpass=$_POST["lpass"];
    $sql = "select *from acc where name = '$userid' and password = '$lpass'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result); 
          
    if ($count == 1) {
        echo "<h1><center> Login successful </center></h1>";
        header("Location: homepage.php");
    } else {
        echo '<div class="alert alert-error shadow-lg absolute top-3">
      <div>
      <link rel="stylesheet" href="css/main.css">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-red flex-shrink-0 h-6 w-6 top-1 fixed" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>Error! Incorrect username or password.</span>
      </div>
    </div> ';
    }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 h-screen overflow-hidden flex flex-col items-center justify-center">
  <div class="bg-white bg-opacity-30 backdrop-blur-xl rounded-lg lg:w-5/12 md:6/12 w-10/12 shadow-3xl">
    <div class="bg-transparent absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-full p-4 md:p-8">
    <button class="btn btn-ghost"><a href="admin.html"><img src="./images/LoGo2.png" width="150" height="150" alt="logo"></a></button>
    </div>
    <form class="p-12 md:p-24" action="" method="post">
      <div class="flex items-center text-lg mb-6 md:mb-8">
        <svg class="absolute -ml-8" width="24" viewBox="0 0 24 24">
          <path d="M20.822 18.096c-3.439-.794-6.64-1.49-5.09-4.418 4.72-8.912 1.251-13.678-3.732-13.678-5.082 0-8.464 4.949-3.732 13.678 1.597 2.945-1.725 3.641-5.09 4.418-3.073.71-3.188 2.236-3.178 4.904l.004 1h23.99l.004-.969c.012-2.688-.092-4.222-3.176-4.935z"/>
        </svg>
        <input type="text" name="fname" id="username" class="input bg-gray-200 input-bordered w-full" placeholder="  Username" />
      </div>
      <div class="flex items-center text-lg mb-6 md:mb-8">
        <svg class="absolute -ml-8" viewBox="0 0 24 24" width="24">
          <path d="m18.75 9h-.75v-3c0-3.309-2.691-6-6-6s-6 2.691-6 6v3h-.75c-1.24 0-2.25 1.009-2.25 2.25v10.5c0 1.241 1.01 2.25 2.25 2.25h13.5c1.24 0 2.25-1.009 2.25-2.25v-10.5c0-1.241-1.01-2.25-2.25-2.25zm-10.75-3c0-2.206 1.794-4 4-4s4 1.794 4 4v3h-8zm5 10.722v2.278c0 .552-.447 1-1 1s-1-.448-1-1v-2.278c-.595-.347-1-.985-1-1.722 0-1.103.897-2 2-2s2 .897 2 2c0 .737-.405 1.375-1 1.722z"/>
        </svg>
        <input type="password" name="lpass" id="password" class="input bg-gray-200 input-bordered w-full" placeholder=" Password" />
      </div>
    
      <button class="btn bg-primary font-medium p-2 md:p-4 text-white uppercase w-full" name="LIbtn">Login</button>
      
      <button class="btn btn-ghost self-center btn-outline mt-3 left-44 "><a href="signup.php">sign up</a></button>
    </form>
  </div>
  
 </div>
</body>
</html>
