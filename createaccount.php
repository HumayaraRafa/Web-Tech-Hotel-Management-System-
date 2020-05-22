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
    
</head> 
<body>
    <header id="s3">
		<nav>
			<div class="row clearfix">
				<label class="logo">
            HotelBooking.com
        </label>

		<ul class="main-nav animated slideInDown" id="check-class">
            <li><a href="homepage.php">Home</a></li>
            <li><a class="active" href="createaccount.php">Create Account</a></li>
            <?php
					
          if(isset($_SESSION["Pattern"]) && $_SESSION["Pattern"]="customer"){
              ?>
                  <li>
                      <a class="active" href="booking.php">Your Booking </a>
                  </li> 
              <?php
          }else{
             
              
             
          }
      ?>
            <li><a href="signin.php">Sign in</a></li>
        </ul>
        <a href="#" class="mobile-icon"  onclick="slideshow()"> <i class="fa fa-bars"></i> </a>
    </div>
    </nav>
 
       
        <div align="center">  
                
            <table >
                 <tr align="left">
                     <th ><Label style="font-size: larger;color:blanchedalmond;">Create Account </Label></th>
                 </tr>
				 
                <tr align="left">
                    <td height="50"><Label class="text-white">Full Name:  </Label></td>
                </tr>
                
                <tr >
                   <td><input type="text" id="name" placeholder="Full Name" required size="40"><span id="ErrorMName" style="color:bisque;"></span></td>
                   
               </tr>
                <tr align="left">
                    <td height="50"><Label class="text-white">Email Address:   </Label></td>
                </tr>
                
                <tr >
                   <td><input type="email" id="email" placeholder="Email Address"/><span id="ErrorMEmail" style="color:bisque;"></span> </td>
                   
               </tr>
               
                <tr align="left">
                    <td height="30"><Label class="text-white">Password: </Label></td>
                </tr>

                <tr >
                    <td><input type="password" id="password" placeholder="Password" /><span id="ErrorMPassword" style="color:bisque;"></span></td>
                    
                </tr>

                <tr align="left">
                    <td height="30"><Label class="text-white">Confirm Password: </Label></td>
                </tr>
                
                <tr >
                    <td><input type="password"  id="confirmpassword" placeholder="Confirm Password" /><span id="ErrorMCPassword" style="color:bisque;"></span></td>
                    
                    
                </tr>
				
				

                <tr align="left">
                    <td>
                        <button class="btn btn-outline-secondary text-white mt-5" id="SubmitOfCustomer">Create Account</button>
                    </td>
                    
                </tr> 

                
				<tr align="left"> 
                    <td height="50" border="1px">
                        <Label class="text-white">
                            Already have an account?
                            <a class="btn btn-primary" href="signin.php">Sign in</a>
                        </Label> 
                    </td>
                </tr> 
               </table>
                   
            </div>

            <div id="SaveManagerAdd" style="width: 50%;height:10%;margin:0 auto;text-align:center;">

            </div> 
       
    </header>  
    
    <script>
    $(document).ready(function(){
      $("#SubmitOfCustomer").click(function(){
        var CustomerName = $("#name").val();
        var CustomerEmail = $("#email").val();
        var CustomerPassword = $("#password").val();
        var CustomerConfirmPassword = $("#confirmpassword").val();
        var emailblockReg =/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
       

       if(CustomerName ==''){
        
          $('#ErrorMName').text('Please fill up the name')
         
        }else if(CustomerEmail==''){
          $('#ErrorMEmail').text('Please fill up the email')
        }else if(CustomerPassword==''){
          $('#ErrorMPassword').text('Please fill up the password')
        }else if(CustomerConfirmPassword==''){
          $('#ErrorMCPassword').text('Please fill up the Confirm password')
        }
        else if(CustomerPassword.length<8){
          $('#ErrorMPassword').text('minimum password length should be 8')
        }else if(CustomerConfirmPassword != CustomerPassword){
          $('#ErrorMCPassword').text('password not matched')
        }
        else if(!emailblockReg.test(CustomerEmail)){
          $('#ErrorMEmail').text('Enter a valid email address')
          // hasError = true
        }else{
          $('#ErrorMName').empty();
          $('#ErrorMEmail').empty();
          $('#ErrorMPassword').empty();
          $('#ErrorMCPassword').empty();
          //$('#SaveManagerAdd').empty() ;
          $.ajax({
                method:"get",
                url: "CustomerRegistrationBAckEnd/customerRegistration.php",
                data: { CustomerName : CustomerName, CustomerEmail : CustomerEmail,CustomerPassword : CustomerPassword},
                success:function(response){
                    $('#SaveManagerAdd').html(response).slideUp(2500);
                }
            });
            setTimeout(function(){
              $('#SaveManagerAdd').empty() ;
            },3000);
            $("#name").val('');
            $("#email").val('');
            $("#password").val('');
            $("#confirmpassword").val('');
           
        }
        
      })
    })
  </script>
</body>
</html>
