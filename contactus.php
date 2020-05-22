<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name= viewport content= "width=device-width, initial-scale=1.0">
	<title>HotelBooking.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
	<header>
		<nav>
			<div class="row clearfix">
				<label class="logo">
            HotelBooking.com
        </label>

				<ul class="main-nav animated slideInDown" id="check-class">
					<li><a href="homepage.php">Home</a></li>
					<li><a href="createaccount.php">Create Account</a></li>
					<li><a href="booking.php">Your Booking </a></li>
					<li><a href="signin.php">Sign in</a></li>
				</ul>
				<a href="#" class="mobile-icon"  onclick="slideshow()"> <i class="fa fa-bars"></i> </a>
			</div>
		</nav>

    </header>

    <div  id="s9">
        <form id="contact-us">
            <div align="center">
                <table >
                    <tr align="Center">
                        <th ><Label style="font-size: larger;">Contact Us </Label></th>
                    </tr>

                    <tr align="left">
                        <td height="50"><Label >Full Name:   </Label></td>
                    </tr>

                    <tr >
                        <td><input type="text" id="fullName" name="fullName" placeholder="Full Name" size="40"></td>
                    </tr>

                    <tr align="left">
                        <td height="30"><Label > Email Address:</Label></td>
                    </tr>
                    <tr >
                        <td><input type="email" id="email" name="email" placeholder="Email Address"  size="40"></td>
                    </tr>
                    <tr align="left">
                        <td height="30"><Label > Phone No:</Label></td>
                    </tr>
                    <tr >
                        <td><input type="text" id="phoneNo" name="phoneNo" placeholder=" Phone No"  size="40"></td>
                    </tr>

                    <tr align="left">
                        <td>
                            <!--<input class="button" type="submit" value="Send">-->
                            <button type="button" class="btn btn-primary" id="btnContactFormSubmit">Send</button>

                        </td>
                    </tr>
                    <div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">

                        <p class="contact-agile1"><strong>Phone :</strong>+880179354283</p>
                        <p class="contact-agile1"><strong>Email :</strong> <a href="mailto:name@example.com">INFO@HOTEL.COM</a></p>
                        <p class="contact-agile1"><strong>Address :</strong>Dhaka,Bangladesh</p>
                    </div>
                </table>
            </div>
        </form>

        <div id="contactUsSuccess" style="width: 50%;height:15%;margin:0 auto;text-align:center;">

        </div>
    </div>
    <script>
        $(document).ready(function() {

            $("#btnContactFormSubmit").click(function (e) {
                e.preventDefault();
                if ( isFilled() ) {
                    var button = e.target;
                    button.disabled = true;
                    $.ajax({
                        method: "POST",
                        url: "ContactUsBackEnd/createContactRequest.php",
                        data: $('#contact-us').serialize(),
                        success: function (response) {
                            button.disabled = false;
                            $('#contactUsSuccess').html(response).slideUp(3000);
                            $("#contact-us").trigger("reset"); //Finally reset the form
                        }
                    });
                } else {
                    return false;
                }

            });


        });


        /*!
         * Check if input fields are empty
         * @return boolean
         * ******************************/
        function isFilled() {

            if (!$("#fullName").val()) {
                alert("Please enter your full name.");
                $("#fullName").focus();
                return false;
            }

            if (!$("#email").val()) {
                alert("Please enter your email address.");
                $("#email").focus();
                return false;
            }

            if (!$("#phoneNo").val()) {
                alert("Please enter your phone number.");
                $("#phoneNo").focus();
                return false;
            }

            return true;
        }

    </script>

    </body>
</html>
 