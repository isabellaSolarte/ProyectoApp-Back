<?php

    include("db.php");
    
    if (isset($_GET["cod_producto"])) {
        
        $id= $_GET["cod_producto"];
       
        $query = "DELETE FROM producto WHERE COD_PRODUCTO= $cod_producto";
        $result = mysqli_query($conn, $query);
            if (!$result) {
                echo "Error en la inserción del producto: " . mysqli_error($conn);
            }
            $_SESSION['message']='Producto eliminado satisfactoriamente';
            $_SESSION['message_type']='danger';
            header("Location: index.php");

        

            
            
    }

?>