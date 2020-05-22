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

            if(isset ($_GET["ID"]))
            {
                    
                    $id = $_GET["ID"];
            
                    $sql ="SELECT * FROM  roomimage  INNER JOIN rooms ON  roomimage.rid = rooms.id WHERE rid = '$id' group by roomimage.id";
                    $result = mysqli_query($conn,$sql) or die("could not insert".mysqli_error($conn));
                    ?>
                        <h1 class="text-center text-black-50">All Information of Selected Room</h1>
                    <?php
                    $arr = array();
                    $arr1 = array();
                    $arr2 = array();
                    $roomType = array();
                    while($row=  mysqli_fetch_array($result)){  
                        echo '<img class="p-2" src="data:image/jpeg;base64,'.base64_encode($row["images"]).'" width="250" height="250">'; 
                        
                        $arr[] = $row["Price"];
                        $arr1[] = $row["MaxPeople"];
                        $arr2[] = $row["AvailableRoom"];
                        $roomType = $row["RoomType"];
                    }
                    ?>
                        <p class="mt-5">Price: <b><?php
                             echo '    '.'BDT'.$arr[0];
                        ?></b></p>
                        <p class="">Maximum People: <b><?php
                             echo '    '.$arr1[0];
                        ?></b></p>
                         <p class="">Available Room: <b><?php
                             echo '    '.$arr2[0];
                        ?></b></p>
                         <p>RoomType: <b><?php
                             echo '    '.$roomType;
                        ?></b></p>
                    <?php
                        if(isset($_SESSION["Pattern"]) && $_SESSION["Pattern"]="customer"){
                            $_SESSION["roomType"] = $roomType;
                            $_SESSION["availableroom"] = $arr2[0];

                        ?>  
                           <a href="BookNow.php" rel="modal:open" class="btn btn-success" id="bookNow">Book Now</a>
                           <?php
                        }else{
                            ?>
                                 <a class="btn btn-info text-white" href="signin.php">Please Login For Booking</a>
                            <?php
                        }
                        ?>
                        
                    <?php
            }
            
            else
            
            {
                    
               
            
            }
           
}

?>

<script type="text/javascript">

    $(document).ready(function(){
        $('#bookNow').click(function(){
            $(this).modal({
                fadeDuration:300,
                fadeDelay:0.50,
            });
            return false;
        });
    });

</script>