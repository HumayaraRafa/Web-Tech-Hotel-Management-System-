<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<td>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelBooking.com</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<body>
    <header id="s2">
		<nav>
			<div class="row clearfix">
				<label class="logo">
            HotelBooking.com
        </label>

		<ul class="main-nav animated slideInDown" id="check-class">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="createaccount.php">Create Account</a></li>
            <?php
					
                    if(isset($_SESSION["Pattern"]) && $_SESSION["Pattern"]="customer"){
                        ?>
                            <li>
                                <a class="active" href="booking.php">Your Booking </a>
                            </li> 
                        <?php
                    }else{}
            ?>
            <li><a class="active" href="signin.php">Sign in</a></li>
        </ul>
        <a href="#" class="mobile-icon"  onclick="slideshow()"> <i class="fa fa-bars"></i> </a>
    </div>
    </nav>
    <form method="post" action="Main.php">
        <div align="center"> 
                <p style="color:red;">
                    <?php 
                    if(isset($_REQUEST["error"]))echo $_REQUEST["error"];
                    ?>
		        </p>      
            <table >
                 <tr align="left">
                     <th ><Label class="text-white"  style="font-size: larger;">Sign In </Label></th>
                 </tr>
                
                <tr align="left">
                    <td height="50"><Label class="text-white" >Email Address:   </Label></td>
                </tr>
                
                <tr >
                   <td><input type="text"  placeholder="Email Address" name="uname" size="40"</td>
               </tr>
               
                <tr align="left">
                    <td height="30"><Label class="text-white" >Password: </Label></td>
                </tr>
                <tr >
                    <td><input type="password" placeholder="Password" name="password"  size="40"></td>
                </tr>
                
                <tr align="left">
                    <td>
                    <button type ="submit" id = "btn" name = "submit" class="btn btn-block btn-primary ">Login</button>
                </td>
                </tr> 

                
               
                
                </table>
                   
            </div>
       </form>
    <div class="col-6" style="margin-top: 150px; margin-left:600px">
        <ul>
            <li>
                <Label class="text-white">
                    Don't have an account?
                    <a class="btn btn-primary" href="createaccount.php" type="submit" >Sign Up</a>
                </Label> 
            </li>
        </ul>
        
    </div>   
  
                        
                  
    </header>       
</body>
</html>
