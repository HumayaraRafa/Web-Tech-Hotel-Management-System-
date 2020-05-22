<?php
   
   //////Login//////
   
        function FromMySql($sql,$sql1,$sql2)
        {
            //datasource = "mysql";
            global $adminLogin;
            
            global $managerLogin;
            
            global $customerLogin;
            
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
            
            
                $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                
                $adminLogin = array();
                
                while($row = mysqli_fetch_assoc($result))
                {
                    $mr = array();
                    
                    $mr["id"] = $row["id"];
                    $mr["AdminName"] = $row["AdminName"];
                    $mr["AdminEmail"] = $row["AdminEmail"];
                    $mr["AdminPassword"] = $row["AdminPassword"];
                    $mr["roles"] = $row["roles"];
                    
                    $adminLogin[] = $mr;
                    
                }
                
                $result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
                
                $managerLogin = array();
                
                    while($row = mysqli_fetch_assoc($result1))
                    {
                        $tchr = array();
                        
                        $tchr["id"] = $row["id"];
                        $tchr["ManagerName"] = $row["ManagerName"];
                        $tchr["ManagerEmail"] = $row["ManagerEmail"];
                        $tchr["ManagerPassword"] = $row["ManagerPassword"];
                        $tchr["roles"] = $row["roles"];

                        $managerLogin[] = $tchr;
                        
                    }

                $result2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));    
                $customerLogin = array();    

                    while($row = mysqli_fetch_assoc($result2))
                        {
                            $chr = array();
                            
                            $chr["id"] = $row["id"];
                            $chr["CustomerName"] = $row["CustomerName"];
                            $chr["CustomerEmail"] = $row["CustomerEmail"];
                            $chr["CustomerPassword"] = $row["CustomerPassword"];
                            $chr["roles"] = $row["roles"];

                            $customerLogin[] = $chr;
                            
                        }
                
            }
            
            
        }
?>