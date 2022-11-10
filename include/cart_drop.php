<?php 
echo '<label tabindex="0" class="btn btn-ghost btn-circle">
        <div class="indicator">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>';
          
          echo '<span class="badge badge-sm indicator-item">',$_SESSION['count'],'</span>';

       echo' </div>
      </label>
      <div tabindex="0" class="mt-3 card card-compact dropdown-content w-max bg-base-100 shadow">
        <div class="card-body">';
        
          echo "<span class='font-bold text-lg'>",$_SESSION['count']," Items</span>";
          $total=0;
          $n=0;
foreach ($cart as $key => $value)
{
  $n+=1;
   $sql="SELECT * FROM products WHERE id='$key'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row["pname"];
    echo '<h2 class=" text-base text-dblue-300 truncate">',$n,'.&ensp;',strtoupper($name),'&ensp;<span class="badge badge-md ">',$value,'</span></h2>&ensp;';  
    $price=$row["price"];
    $price=(int)$price;
    $total+=$price*$value;
    
}
echo "<span class=' text-base'><b>Subtotal:</b> <span class=''>₹",$total,"</span></span>";
      ?>