
<!DOCTYPE html>
<html lang="en" data-theme='cupcake'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div class="hero min-h-screen bg-sun-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left">
        <h1 class="text-5xl m-4 font-bold">sign up now!</h1>
        <p class="py-6 m-4">sign up now to browse our amazing collection of shoes and fashion apparels from awesome brands like
          Adidas,Nike,New balance,Puma etc..
        </p>
      </div>
      <div class="card flex-shrink-0 ml-12 w-96 shadow-2xl bg-sun-50">
        <div class="card-body">
          <form action="" method="post" autocomplete="off">
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input input type="text" required placeholder="E-mail" name="email" class="input bg-gray-200 input-bordered w-full" />
            <label class="label">
              <span class="label-text">Username</span>
            </label>
            <input input type="text" required placeholder="Username" name="uname" class="input bg-gray-200 input-bordered w-full" />
            <label class="label">
              <span class="label-text">First name</span>
            </label>
            <input input type="text" required placeholder="First name" name="fname" class="input bg-gray-200 input-bordered w-full" />
            <label class="label">
              <span class="label-text">last name</span>
            </label>
            <input input type="text" required placeholder="Last name" name="lname" class="input bg-gray-200 input-bordered w-full" />
            <label class="label">
              <span class="label-text">Phone number</span>
            </label>
            <input input type="text" required placeholder="Phone number" name="num" class="input bg-gray-200 input-bordered w-full" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="password" required placeholder="password" class="input bg-gray-200 input-bordered w-full"  name="password" />
      
          </div>
          <div class="form-control mt-6">
            <button type="submit" name="Sbtn" class="btn btn-primary">Sign up</button>
            
          </form>
          
          <button class="btn btn-outline btn-secondary mt-3"><a href="index.php">Login</a></button>
          
          </div>
        </div>
      </div>
    </div>
  </div>  
  <?php
include('include/connect.php');
if (isset($_POST["Sbtn"])) {
    $email=$_POST["email"];
    $pass=$_POST["password"];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $uname=$_POST['uname'];
    $num=$_POST['num'];
    $sql = "select *from acc where user_name = '$uname'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
if($count==0)
{
    $sql = "INSERT INTO acc (user_name, last_name, first_name, email, number, password,admin) VALUES ('$uname','$lname','$fname','$email','$num ,'$pass',0)";
  
    if (mysqli_query($conn, $sql)) {
      echo '<script> setTimeout(function() { window.location = "index.php"; }, 2000); </script>';
      echo "<div class='alert alert-success shadow-lg top-2 fixeds z-15'>
      <div>
        <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
        <span>Account created succesfully!</span>
      </div>
    </div>";
  } 
}
else {
 header("Refresh:2");
  echo "<div class='alert alert-error shadow-lg top-2 fixed z-15'>
  <div>
    <svg xmlns='http://www.w3.org/2000/svg' class='stroke-current flex-shrink-0 h-6 w-6' fill='none' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>
    <span>Username already exists</span>
  </div>
</div>";
}
}
?>