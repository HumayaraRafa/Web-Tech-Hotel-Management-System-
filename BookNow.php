<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
    <style>
       #s4{
	background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('../images/booking.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    height: 100vh;
}
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;;
            font-size: 20px;
            color: black;
            /* overflow-x: hidden; */
        }
/* 
        form {
            margin: 0 auto;
            width: 600px;
            padding: 1em;
            border: 1px solid #CCC;
            border-radius: 1em;
            position: fixed;
            top: 50%;
            left: 50%;
            margin-top: -100px;
            margin-left: -200px;
            background-color: #ffff;
           
        } */

        /* input[type=date]{
            width: 250px;
            border: 2px solid #aaa;
            border-radius: 4px;
            margin: 8px 0;
            outline: none;
            padding:8px;
        }
        
        select{
            width: 100px;
            border: 2px solid #aaa;
            border-radius: 4px;
            margin: 8px 0;
            outline: none;
            padding:8px;
        }

        #div{
            margin: 0;
            padding: 0;
            height: 50px;
            width: 100%;
        } */

    </style>
</head>
<body>
<form method="post">
            <table>
                <tr align="left">
                    <th><label for="check-in">Check-in</label></th>
                    <th><label for="check-out">Check-out</label></th>
                </tr>
                <tr>
                    <th><input type="date" name="checkin" id="cin"><span id="ErrorCheckIn" style="color: red;"></span></th>
                    
                    <th><input type="date" name="checkout" id="cout"><span id="ErrorCheckOut" style="color: red;"></span></th>
                    
                    <th align="right"><img src="./H/H/images/Homie.jpg" alt=""></th>
                </tr>
                <tr align="left">
                    <td style="font-size: 15px">day</td>
                    <td style="font-size: 15px">day</td>
                </tr>
            </table>
            <hr>
            <table width="500" class="text-black-50">
                <tr>
                    <!-- <th>Rooms</th> -->
                    <th>Adults</th>
                    <th>Children</th>
                </tr>
                <tr>
                    <th>
                        <input type="number" name="adult" id="ad"/><br>
                        <span id="ErrorAdult" style="color: red;"></span>
                        <label for="" style="font-size: 15px"> Aged 18+ </label>
                    </th>
                    <th>
                    <input type="number" name="children" id="ch"/> <br>
                    <span id="ErrorChild" style="color: red;"></span>
                        <label for="" style="font-size: 15px"> 0-17 </label>
                    </th>
                </tr>
				<table width="500"><br>

                        <label for="" style="font-size: 15px"><b>Please Select Number of rooms: </b></label><br>
                        <span id="Errornumberofrooms" style="color: red;"></span>
                        
                        <input type="number" id="numberofrooms"/><label> We have <?php echo  $_SESSION["availableroom"]  ?> Room Available</label><br>
                        
              
              
            </table>
            <hr>
           <div id="div" align="right">
                <input  class="button" id="SubmitAdd" name="submit" type="submit" value="Add"> 
           </div>
        
        </form>

        <div id="showBook"></div>



 
        
        <script>
    $(document).ready(function(){
      $("#SubmitAdd").click(function(){

        event.preventDefault();
        var CheckIn = $("#cin").val()
        var CheckOut = $("#cout").val()
        var Adult = $("#ad").val()
        var Child = $("#ch").val()
        var Numberofrooms = $("#numberofrooms").val()
        
        // var form = $("#fileUploadForm")[0];
        // var f = new FormData(form);
        if(CheckIn ==''){
          $('#ErrorCheckIn').text('Please fill up the Check In')
          
        }else if(CheckOut==''){
          $('#ErrorCheckOut').text('Please fill up the Check Out')
        }else if(Adult==''){
          $('#ErrorAdult').text('Please fill up the Adult')
        }else if(Child==''){
          $('#ErrorChild').text('Please fill up the Child')
        }else if(Numberofrooms==''){
            $('#Errornumberofrooms').text('Please fill up the Child')
        }else{
          $('#ErrorCheckIn').empty()
          $('#ErrorCheckOut').empty()
          $('#ErrorAdult').empty()
          $('#ErrorChild').empty()
        
          $.ajax({
                method:"post",
                url: "booknowjs.php",
                data:{CheckIn:CheckIn,CheckOut:CheckOut,Adult:Adult,Child:Child,Numberofrooms:Numberofrooms},
                success:function(response){
                  $('#showBook').html(response); 
                }
            });
            setTimeout(function(){
              $('#showBook').empty() 
            },3000)

            $("#cin").val('')
            $("#cout").val('')
            $("#ad").val('')
            $("#ch").val('')
        }
        
      })
    })
  </script>        
</body>
</html>

