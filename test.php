<!DOCTYPE html>
<html lang="en">
<head>
  <title>Document</title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>









<div class="drawer">
  <input id="my-drawer" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content">
    <!-- Page content here -->


    <div class="navbar bg-sun-500 rounded-2xl ">


<div class="flex-1 gap-1">
<button class="btn bg-dblue-500 text-white"><a href="add_products.php"><h2>Add new product +</h2></a></button>
<label for='edit' class='btn bg-dblue-500 text-white modal-button'>Edit Product</label>
<label for='delete' class='btn bg-dblue-500 text-white modal-button'>Delete product</label>
</div>
<div class="flex-none gap-2">
  <form action="" method="POST">
        <div class=" input-group">
        <input type="text" placeholder="Search…" name="Search" class="input input-bordered" />
        <button class="btn btn-square bg-dblue-500 " name="Sbtn">
        <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
        </button>
</div>
  </form>
</div>

</div>


    <label for="my-drawer" class="btn btn-primary drawer-button">Open drawer</label>
  </div> 
  <div class="drawer-side">
    <label for="my-drawer" class="drawer-overlay"></label>
    <ul class="menu p-4 overflow-y-auto w-80 bg-base-100 text-base-content">
      <!-- Sidebar content here -->
      <li><a>Sidebar Item 1</a></li>
      <li><a>Sidebar Item 2</a></li>
      
    </ul>
  </div>
</div>



</body>
</html>