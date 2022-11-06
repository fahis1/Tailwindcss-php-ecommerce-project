
<html>
  <head>
    <link rel="stylesheet" href="css/main.css">
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
<ul class=" hover:text-sun-500">
    <form action="" method="POST">
    <li><input type="submit" value="ORDER STATUS" name="os" class="btn btn-ghost">
  
  </li>
    <li><a>Item 2</a>
    <ul class="dropdown">
                <li><a href="#">Laptops</a></li>
                <li><a href="#">Monitors</a></li>
                <li><a href="#">Printers</a></li>
            </ul></li>
    </form>
  </ul>
</body>
</html>