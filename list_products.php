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



/*
<?php 
                                                    $query2 = "SELECT * FROM PRODUCTO WHERE FECHA_VENCIMIENTO_PRD < CURDATE();";
                                                    $result= mysqli_query($conn,$query2);  
                                                    while($row = mysqli_fetch_array($result)){ ?>
                                                    <td><?php echo $row['COD_PRODUCTO'] ?></td>
                                                    <td><?php echo $row['NOMBRE_PRODUCTO'] ?></td>
                                                    <td><?php echo $row['PRECIO_PUBLICO_PRD'] ?></td>
                                                    <td><?php echo $row['FECHA_VENCIMIENTO_PRD'] ?></td>
                                                    <td><?php echo $row['PRODUCTO_CANTIDAD'] ?></td>
                                                    <td><?php echo $row['LABORATORIO'] ?></td>
                                                <?php } ?>