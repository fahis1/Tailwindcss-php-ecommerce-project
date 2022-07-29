<?php
  include("connection.php")
?>
<!DOCTYPE html>
<html>
<head>
<style>
      *{
        font-family: 'Inter', sans-serif;
      }
      </style>
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"> 
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>address</title>
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
 <body>
    <form action=""  method="post">

  <h1> Add Address </h1>
   <hr>
    <h4> Contact Info </h4>
     <input type ="text" name ="name" placeholder="Name"><br>
     <input type ="number" name ="number" placeholder="Number"><br>
   <hr>
    <h4> Address info </h4>
      <input type ="number" name="pincode" placeholder="Pincode"><br>
      <input type ="text" name="city" placeholder="City"><br>

      <input type ="text" name="state" placeholder="State"><br>
      <input type ="text" name="area" placeholder="Locality/Area/Street"><br>
      <input type ="text" name="building_name" placeholder="Flat no /Building Name"><br>
      <input type ="text" name="landmark" placeholder="Landmark(optional)"><br>
      <hr>
      <input type="submit" name="save" value="Save Address">

     <?php 
        if(isset($_POST['save']))
        {
          $name=$_POST['name'];
          $number=$_POST['number'];
          $pincode=$_POST['pincode'];
          $city=$_POST['city'];
          $state=$_POST['state'];
          $area=$_POST['area'];
          $building_name=$_POST['building_name'];
          $landmark=$_POST['landmark'];

        $sql="insert into address (name,number,pincode,city,state,area,building_name,landmark) 
        values ('$name','$number','$pincode','$city','$state','$area','$building_name','$landmark')";
           if (mysqli_query($conn,$sql))
             {
            echo "Submitted Successfully";
             }
           else
             {
              echo "Not Submitted";

             }

        }
      ?>
 </body>
</html>