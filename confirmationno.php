<?php

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelBooking.com</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<body>
    <header id="s7">
    <nav>
        <div class="row clearfix">
        <label class="logo">HotelBooking.com</label>

        <ul class="main-nav animated slideInDown" id="check-class">
            <li><a href="homepage.php">Home</a></li>
            <?php
					
                    if(isset($_SESSION["Pattern"]) && $_SESSION["Pattern"]="customer"){
                        ?>
                        <li><a href="Admin/logout.php">Sign out</a></li>
                    <?php
                    }else{
                        ?>
                        <li><a href="signin.php">Sign in</a></li>
                        <?php
                    }
                ?>
        </ul>
        <a href="#" class="mobile-icon"  onclick="slideshow()"> <i class="fa fa-bars"></i> </a>

    </nav>

    <div id="showConfirmationNo" style="background-color:black;text-align:center;width:50rem;margin:5rem auto;border-radius:2rem;"></div>
    </header>
    

	<script>
        $(document).ready(function(){
          
            $.ajax({
              method:"get",
              url: "confirmationCode.php",
              success:function(response){
                    $('#showConfirmationNo').html(response);
					// console.log(response.length)
					//for(var i=0;i<res)
                 
                    
              },
            });
            
        })
      </script>    

</body>
</html>
