
<html>
  <head>
    <link rel='stylesheet' href='css/main.css'>
    <script>
      function redirect(oid) {
        
        console.log(oid);
  window.location.href = 'user_order?oid='+oid;

func1(23);
      }
    </script>
    <style>


    ul li ul.dropdown{

        display: none;

    }
    ul li:hover ul.dropdown{
        display: block;	/* Display the dropdown */
    }

</style>
  </head>
</body>
<div class=" m-6 p-6 flex flex-row bg-sun-200 rounded-2xl">
<img src='products/$img' class='border-double  rounded-lg border-4 border-dblue-500' height='180px' width='180px'>
<div class=" w-full">
<h2 class=" text-4xl font-semibold text-dblue-300 truncate">
    &ensp;&ensp;',strtoupper($name),'&ensp;&ensp;
  </h2>
  <h3 class=" ml-12 mt-3 text-xl text-dblue-300 truncate">
  Quantity:&ensp;<span class="badge badge-md ">',$value,'</span>
  </h3>
    <div class="flex h-20 justify-end items-end">
    <p class="flex justify-end items-end text-xl mr-5 font-bold">Net Unit Price:<p class=" text-3xl font-mono"> ₹ ',$unit_price,.00'</p></p>
    </div>
    </div> 
</div>
<?php
$name="ultrboost";
$unit_price=25780;
$value=2;
echo '<div class=" flex flex-row"><span><h2 class=" text-xl text-dblue-300 truncate">&ensp;&ensp;',strtoupper($name),'&ensp;&ensp; Quantity:&ensp;<span class="badge badge-md ">',$value,'</span>&ensp;Net Unit Price: ₹', $unit_price,'</h2>';
echo "<img src='products/232s.jpg' class='border-double rounded-lg border-4 border-dblue-500' height='300px' width='300px'></span></div>";
?>
</body>
</html>