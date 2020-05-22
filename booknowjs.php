
<?php
 session_start();

 $servername = "localhost";
 $username = "root";
 $password = "";
 $db = "hms";

 $conn = mysqli_connect("$servername","$username","$password","$db");

 if(!$conn)
 {
  die("Connection failed: " . mysqli_connect_error());
 }
 else{
        $checkin = $_REQUEST["CheckIn"];
        $CheckOut = $_REQUEST["CheckOut"];
        $Adult = $_REQUEST["Adult"];
        $Child = $_REQUEST["Child"];
        $permission = false;
        $Room =  $_SESSION["roomType"];
        $Numberofrooms = $_REQUEST["Numberofrooms"]; 
        $Availablerooms = $_SESSION["availableroom"];
        $ActualRoom = $Availablerooms-$Numberofrooms;
        $customerId =  $_SESSION["Customer_Id"];

        if($Numberofrooms>$Availablerooms){
             echo "<div class='alert alert-danger'><strong>Success!</strong>We Dont have".' '.$Numberofrooms.' '."amount of room</div>";
        }else{
            $sql ="INSERT INTO customerbookingroom(cid,room,numberofroom,checkin,checkout,adult,children,permission) VALUES ('$customerId','$Room','$Numberofrooms','$checkin','$CheckOut','$Adult','$Child','$permission')";
            $result = mysqli_query($conn,$sql) or die("could not insert".mysqli_error($conn));
            
            $updateAvailAbleroom="UPDATE rooms SET AvailableRoom = '$ActualRoom' WHERE RoomType = '$Room'";
            $result1 = mysqli_query($conn,$updateAvailAbleroom) or die("could not insert".mysqli_error($conn));

            if($result)
            {
                echo "<div class='alert alert-success'><strong>Success!</strong> Successfully Saved Record Please Wait for Coupon</div>";
            }
            else
            {
                echo "Bingo";
            }
        }
        
        
    }
 
?>