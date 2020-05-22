<?php

$adminLogin= array();

$managerLogin = array();

$customerLogin = array();





require("LoginFromAnything.php");




FromMySql("select * from admins","select * from manager","select * from customer");




session_start();

$duration = 600;



if(isset($_POST["submit"])){
    
    
        if(strlen($_POST["uname"])==0  or  strlen($_POST["password"])==0 )
        {
            header("Location:signin.php?error=Username Or Password Cannot Be Empty");
        }
    
    
    
    else{
      
   $count = 0;
        
    foreach($adminLogin as $a)
    {
        

        
        
        if($a['AdminEmail']==$_POST['uname'] && $a['AdminPassword']==$_POST['password'])
        {
         
           $_SESSION["Pattern"]="admin";
           $_SESSION["AdminEmail"]=$a["AdminEmail"];
           $_SESSION["roles"]=$a["roles"];
            
        
            
            ?>
            
            <script type="text/javascript">
                window.location="Admin/";
            </script>

        <?php
     
            $count++;
     
        }
    
  
     }
        
    $count1 = 0;
        
    foreach($managerLogin as $b)
    {
        

        
        
        if($b['ManagerEmail']==$_POST['uname'] && $b['ManagerPassword']==$_POST['password'])
        {
            
         
           $_SESSION["Pattern"]="manager";
            
             $_SESSION["Manager_Id"]=$b["id"];
             $_SESSION["ManagerEmail"]=$b["ManagerEmail"];
             $_SESSION["roles"]=$b["roles"];
            
            
            ?>
                    <script type="text/javascript">
                        
                        window.location="Admin/";


                    </script>
            <?php
            
            $count1++;
     
        }
  
     }

     $count2 = 0;
        
    foreach($customerLogin as $c)
    {
        

        
        
        if($c['CustomerEmail']==$_POST['uname'] && $c['CustomerPassword']==$_POST['password'])
        {
            
         
           $_SESSION["Pattern"]="customer";
            
             $_SESSION["Customer_Id"]=$c["id"];
             $_SESSION["CustomerEmail"]=$c["CustomerEmail"];
             $_SESSION["roles"]=$c["roles"];
            
            
            ?>
                    <script type="text/javascript">
                        
                        window.location="homepage.php";


                    </script>
            <?php
            
            $count2++;
     
        }
  
     }
        
        
      if($count == 0 && $count1 == 0  && $count2 == 0)
      {
          echo "Cant Recognize you";
          header("Location:signin.php?error=Invalid Email or Password");
      }
        
    }
        
}






?>



 