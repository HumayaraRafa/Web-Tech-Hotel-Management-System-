
<?php
 

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
            $HEHE = array();
            $sql = "SELECT * FROM  roomimage INNER JOIN rooms ON rooms.id = roomimage.rid group by rooms.id"; 
            $result = mysqli_query($conn,$sql) or die("could not insert".mysqli_error($conn));

            ?>
            <div class="col-3 float-left">
               
            <?php
         
            
            while($row =  mysqli_fetch_array($result)){    
               
                
               // echo $row['RoomType'];
                ?>
                  

                
                
                    <div class="card-deck">
                        <!-- <div class="row"> -->
                            <div class="card">
                                    <?php
                                    echo '<a href="#"><img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($row["images"]).'" width="150" height="250"></a>';
                                    ?>
                                    <div class="card-body">
                                        <h4 class="card-title " style="color: #000000"><?php echo $row['RoomType'];?></h4>
                                        <!-- <div class="bg-info"> -->
                                        <hr>
                                        <p class="card-text text-black-50 "><small class="text-muted">Available Rooms: <b><?php 
                                            if($row['AvailableRoom']>1){
                                                echo ' '.$row['AvailableRoom'];
                                            }else{
                                                echo "No Room Available";
                                            }
                                        ?></b></small></p>
                                        <!-- </div> -->
                                        <p class="card-text text-black-50"><small class="text-muted">Maximum People:<b><?php  echo ' '.$row['MaxPeople'] ?></b></small></p>
                                        <p class="card-text text-black-50"><small class="text-muted">Price:<b><?php  echo ' '.'BDT'.$row['Price'] ?></b></small></p>
                                        <hr>
                                       
                
    
               
                                        <div>
                                            <div class="col-7 text-black-50 float-left"></div>
                                            <div class="col-5 text-black-50 float-right"><button id="details" data-id='<?php echo $row['rid']?>' class="btn btn-info text-white">Details</button></div>
                                        </div>
                                    </div>
                            <!-- </div> -->
                        </div>
                    </div>
                
                <br>
                <?php
            }
           ?>
            </div>
            <div class="col-9 float-right text-black-50" id="detailsShow">
               
            </div>
            
           <?php
    }
?>

<script>
 $(document).on('click','#details',function(){
      
      var id  =  $(this).attr('data-id')
      console.log(id)
      $.ajax({
          method:"get",
          url: "ShowRoomDetails.php?ID",
          data:{
              ID:id
          },
          success:function(response){
              $('#detailsShow').animate({
                 left:20,
                }, {
                    duration: 1000,
                }).html(response);
              
          },
      });                         
})

</script>




