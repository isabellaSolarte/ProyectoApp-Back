<?php

    include("db.php");
    
    if (isset($_POST["-"])) {

            $query = "SELECT * FROM PRODUCTOS INNER JOIN;";
            $result= mysqli_query($conn,$query);  
            while($row=mysqli_fetch_array($result))  
            {

            }

            
            
    }

?>