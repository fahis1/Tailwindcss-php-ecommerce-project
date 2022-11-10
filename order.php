<?php
include("include/connect.php");
include("include/session.php");
$ocart=json_encode($_SESSION['$cart']);
$pid=$_GET['id'];
$uid=$_SESSION["uid"];
$sql = "INSERT INTO `orders` (`user_id`, `status`, `address`, `order_time`,`products`) VALUES ('$uid', '0', 'address test', NOW(),'$ocart');";
mysqli_query($conn,$sql);
$sql="DELETE FROM cart where user_id='$uid'";
  mysqli_query($conn,$sql);
  $cart=array();
  $_SESSION['$cart']=array();
?>
<html>
    <head>
    <link rel="stylesheet" href="css/main.css">
    <style>
      .animation-ctn{
  text-align:center;
  margin-top:5em;
}

	@-webkit-keyframes checkmark {
    0% {
        stroke-dashoffset: 100px
    }

    100% {
        stroke-dashoffset: 200px
    }
}

@-ms-keyframes checkmark {
    0% {
        stroke-dashoffset: 100px
    }

    100% {
        stroke-dashoffset: 200px
    }
}

@keyframes checkmark {
    0% {
        stroke-dashoffset: 100px
    }

    100% {
        stroke-dashoffset: 0px
    }
}

@-webkit-keyframes checkmark-circle {
    0% {
        stroke-dashoffset: 480px
   
    }

    100% {
        stroke-dashoffset: 960px;
      
    }
}

@-ms-keyframes checkmark-circle {
    0% {
        stroke-dashoffset: 240px
    }

    100% {
        stroke-dashoffset: 480px
    }
}

@keyframes checkmark-circle {
    0% {
        stroke-dashoffset: 480px 
    }

    100% {
        stroke-dashoffset: 960px
    }
}

@keyframes colored-circle { 
    0% {
        opacity:0
    }

    100% {
        opacity:100
    }
}

/* other styles */
/* .svg svg {
    display: none
}
 */
.inlinesvg .svg svg {
    display: inline
}

/* .svg img {
    display: none
} */

.icon--order-success svg polyline {
    -webkit-animation: checkmark 0.25s ease-in-out 0.7s backwards;
    animation: checkmark 0.25s ease-in-out 0.7s backwards
}

.icon--order-success svg circle {
    -webkit-animation: checkmark-circle 0.6s ease-in-out backwards;
    animation: checkmark-circle 0.6s ease-in-out backwards;
}
.icon--order-success svg circle#colored {
    -webkit-animation: colored-circle 0.6s ease-in-out 0.7s backwards;
    animation: colored-circle 0.6s ease-in-out 0.7s backwards;
} 
    </style>
    <script>
      setTimeout(function(){
            window.location.href = 'shop.php';
         }, 1500);
    </script>
    </head>
    <body>
    <div class="flex flex-col p-24 justify-center items-center bg-sun-200 h-full">
    <div class="animation-ctn">
  	<div class="icon icon--order-success svg m-12">
          <svg xmlns="http://www.w3.org/2000/svg" width="154px" height="154px">  
            <g fill="none" stroke="#22AE73" stroke-width="2"> 
              <circle cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
              <circle id="colored" fill="#22AE73" cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
              <polyline class="st0" stroke="#fff" stroke-width="10" points="43.5,77.8 63.7,97.9 112.2,49.4 " style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;"/>   
            </g> 
          </svg>
        </div>
</div>
<div class=" text-4xl mt-12"><H1 >ORDER PLACED SUCCESSFULLY</H1></div>
</div>
        </body>
</html>