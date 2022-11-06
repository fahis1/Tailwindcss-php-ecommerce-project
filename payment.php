<?php
include("include/connect.php");
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
  <div class="navbar flex justify-between flex-row bg-sun-50 h-16 rounded-full m-2 top-2 sticky w-auto z-50">
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
  <div class="main flex flex-row pt-1 pr-5 pl-5">
    <div class=" bg-sun-50 rounded-2xl w-3/4 m-4 p-5">
      <span class=" text-2xl font-medium text-sun-500">Select a payment method</span><br><br>
      <div class="border-2 ml-auto mr-auto border-slate-50 rounded-2xl p-3 bg-porcelain-100">
        <span class=" text-xl font-bold">Payment method</span><br>
        <hr class="border-t-[1px]"><br>
        <form action="" method="POST">
          <input type="radio" name="payment">
          <label class="font-medium ">Pay with Debit/Credit/ATM Cards</label><br>
          <span class=" m-4 ">You can save your card as per new RBI guidelines</span><br><br><br>
          <input type="radio" name="payment">
          <label class="font-medium">Net Banking</label><br><br><br>
          <input type="radio" name="payment">
          <label class="font-medium">Other UPI Apps</label><br><br><br>
          <input type="radio" name="payment">
          <label class="font-medium">EMI options</label><br><br><br>
          <input type="radio" name="payment">
          <label class="font-medium">Pay on Delivery</label>
        </form>
      </div>
    </div>
    <div class=" bg-sun-50 rounded-2xl w-1/4 m-4 p-5 ">
      <span class=" text-xl font-medium ">Order Summary</span><br><br>
      <p>product:</p><br>
      <p>items:</p><br>
      <hr class="border-t-[1px]"><br>
      <span class=" text-xl font-medium ">Order Total:</span><br><br>
      <hr class="border-t-[1px]"><br>
      <button class="bg-sun-500 hover:bg-sun-700 text-white font-bold py-2 px-4 rounded-full ml-12 ">Place your order</button>

    </div>
  </div>
</body>

</html>