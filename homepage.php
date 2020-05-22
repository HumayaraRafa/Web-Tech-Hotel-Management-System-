<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name= viewport content= "width=device-width, initial-scale=1.0">
	<title>HotelBooking.com</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/home.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- jQuery Modal -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<style>
		*{
	margin: 0px;
	padding: 0px;
    text-decoration: none;
    list-style: none;
	box-sizing: border-box;
}

body{
	font-size: 20px;
	overflow-x: hidden;
	color: ghostwhite;
    text-align: center;
	font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

header{
	background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url('./images/Homie.jpg');
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center;
	position: relative;
	height: 70vh;
}

.clearfix:after{
	content: ".";
	visibility: hidden;
	display: block;
	height: 0px;
	clear: both;
}

.row{
	max-width: 1180px;
	margin: 0 auto;
}

.logo{
	color: white;
    font-size: 35px;
    line-height: 80px;
    padding: 0 100px;
}

nav{
    background: #0082e6;
    height: 80px;
    width: 100%;
}
label.logo{
    color: white;
    font-size: 35px;
    line-height: 80px;
    padding: 0 100px;
}
nav ul{
    float: right;
    margin-right: 20px;
}
nav ul li{
    display: inline-block;
    line-height: 80px;
    margin: 0px;
}
nav ul li a{
    color: white;
    font-size: 17px;
    padding: 7px 13px;
    border-radius: 3px;
    text-transform: uppercase;
}

.main-nav li a:hover{
	border-bottom: 2px solid #fff;
}


.main-content-header{
	width: 100%;
	padding:0 2%;
	position: absolute;
	top: 55%;
	left: 50%;
	transform: translate(-50%, -50%);
	height: 10px; 

}

h1{
	color: #fff;
	font-size: 200%;  
	word-spacing: 3px;
	letter-spacing: 3px;
	margin-bottom: 15px;
	text-transform: uppercase;
	font-weight: lighter;
}

.btn{
	display: inline-block;
	padding: 10px 30px;
	font-weight: lighter;
	text-decoration: none;
	text-transform: uppercase;
	border-radius: 100px;
	transition: background-color 0.2s, border 0.2s, color 0.2;
}


.btn-full{
	background-color: transparent;
	color: #0082e6;
	margin-right: 15px;
	border: 1px solid #0082e6;
}

.btn-full:hover{
	background-color: #fff;
}

.btn-nav{
	background-color: transparent;
	color: #0082e6;
	border: 1px solid #fff;
}

.btn-nav:hover{
	background-color: #0082e6;
}


.colorchange{
	animation:  colorchange 1s infinite;
}

@keyframes colorchange{
	0%{color: navy;}
	25%{color:#0082e6;}
	50%{ color: white; }
	100%{ color:#0082e6;  }
}

.mobile-icon{display: none;}


/*//////// Responsive queries //////////*/

@media only screen and (max-width: 1180px){
	.main-content-header{
		width:100%;
		padding:0 2%;
	}

	.row{
		width:100%;
		padding:0 2%;
	}
}

@media only screen and (max-width: 998px){
	h1{font-size: 200%;}
}

@media only screen and (max-width: 768px){
	h1{font-size: 180%;}	

	.main-nav{display: none;}

	.mobile-icon{ display: inline-block; 
		color: #0082e6;
		/* float: right; */
		margin-top: 30px;
		margin-right: 20px;
	}

	.main-nav{float: left;}

	.main-nav li{
		display: block;
		margin-top: 10px;
	}
}

@media only screen and (max-width: 480px){
	.btn-full{
		margin-bottom: 20px;
	}

	h1{font-size: 180%;}
}

.contactUs {
	padding:20px 20px 10px 20px;
	color:#fff;
	background: #0E3060;
}
.contactUs UL {
	list-style: none;
	padding: 0px;
	margin: 30px 0px 0px 0px;
}
.contactUs UL LI {
	margin: 0px 0px 30px 0px;
	padding-left:5px;
	font-size:18px;
}
.contactUs UL LI a {
	font-size:20px;
	font-weight: bold;
	display: inline-block;
	border-bottom:1px solid rgba(255,255,255, .3);
	color:white;
	margin:0px 10px 0px 0px;
}
.contactUs a:hover {
	border-bottom:1px solid rgba(255,255,255, .9);
	transition: all 0.3s ease;
}
.contactUs span {
	font-size:32px;
	display: block;
	margin-bottom:10px;
}
	</style>
</head>
<body>

	<header id="s">
		<nav>
			<div class="row clearfix">
				<label class="logo">HotelBooking.com</label>

				<ul class="main-nav animated slideInDown" id="check-class">
					<li><a class="active"href="homepage.php">Home</a></li>
					<?php
					
                        if(isset($_SESSION["Pattern"]) && $_SESSION["Pattern"]="customer"){
						
						}else{
							?>
							<li><a href="createaccount.php">Create Account</a></li>
							<?php
						}
					?>
					<?php
					
                        if(isset($_SESSION["Pattern"]) && $_SESSION["Pattern"]="customer"){
						
						}else{
							?>
							<li><a href="contactus.php">Contact Us</a></li>
							<?php
						}
					?>
					<?php
					
						if(isset($_SESSION["Pattern"]) && $_SESSION["Pattern"]="customer"){
							?>
								<li>
									<a class="active" href="confirmationno.php">Confirmation</a>
								</li> 
							<?php
						}else{}
					?>
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
			</div>
		</nav>
		<div class="main-content-header">
			<h1> 
                <span class="colorchange">Feel The Difference</span> <br>
                </h1>
            <h3 style="color : floralwhite;">Stylish Living Spaces For Business,Leisure & Travel</h3> <br>
			 
		</div>
       
       
	</header>

	<div id="showManager"  class="card-body">

	</div>

	
	
	
	<script>
        $(document).ready(function(){
          
            $.ajax({
              method:"get",
              url: "viewRooms.php",
              success:function(response){
                    $('#showManager').html(response);
					console.log(response.length)
					//for(var i=0;i<res)
                    
              },
            });
            
        })
      </script>
</body>
</html>