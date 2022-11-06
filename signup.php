
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
  <div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">sign up now!</h1>
        <p class="py-6">sign up now to browse our amazing collection of shoes and fashion apparels from awesome brands like
          Adidas,Nike,New balance,Puma etc..
        </p>
      </div>
      <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <div class="card-body">
          <form action="" method="post">
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input input type="text"  placeholder="E-mail" name="email" class="input input-bordered" />
            <label class="label">
              <span class="label-text">Username</span>
            </label>
            <input input type="text"  placeholder="Username" name="fname" class="input input-bordered" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="password"  placeholder="password" class="input input-bordered"  name="password" />
      
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

    $sql = "INSERT INTO acc (name, email, password) VALUES ('$fname','$email','$pass')";
  
    if (mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-success shadow-lg">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      <span>Account created successfully!</span>
    
    </div>
  </div>';
  header("location:signup.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>