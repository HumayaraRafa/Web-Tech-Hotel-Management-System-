
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

            $CustomerId = $_SESSION["Customer_Id"];
            $sql = "SELECT * FROM customerbookingroom  WHERE cid = '$CustomerId'"; 
            $result = mysqli_query($conn,$sql) or die("could not insert".mysqli_error($conn));
            //$row =  mysqli_fetch_assoc($result);

            // if($row["permission"]==false){
            //      echo "You are not permited yet";
            // }else{
            //     echo "Great!!! Permission has been accepted";
            // }

            //echo $row["cid"];
            echo '<table class="table table-striped table-responsive text-sm-center text-white">';
            echo '<thead >';
            echo    '<tr>';
            echo        '<th>Room Type</th>';
            echo        '<th>Check in</th>';
            echo        '<th>Check out</th>';
            echo        '<th>Permission</th>';
            echo    '</tr>';
            echo '</thead>';
            echo  '<tbody>';

            while($row =  mysqli_fetch_assoc($result)){

                ?>

                <tr>

                <?php
                //echo $row["permission"];
                echo  '<td >';echo $row["room"];echo '</td>';
                echo  '<td >';echo $row["checkin"];echo '</td>';
                echo  '<td >';echo $row["checkout"];echo '</td>';
              
                if($row["permission"]==false){
                    echo  '<td>You are not permited yet</td>';
                    //echo "You are not permited yet";
                }else{

                    echo "<td>Great!!! Permission has been accepted</td";
                
                }

                echo '</tr>';
            }

            echo '</tbody>';
            echo'</table>';

  
    
    }
  
?>


