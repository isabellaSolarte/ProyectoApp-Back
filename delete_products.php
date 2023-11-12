<?php

    include("db.php");
    
    if (isset($_GET["id"])) {
        
        $id= $_GET["id"];
        $sql = "DELETE FROM DISTRIBUCION WHERE COD_PRODUCTO=$id";
        $query = "DELETE FROM producto WHERE COD_PRODUCTO= $id";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_query($conn, $query);
            if (!$result) {
                echo "Error en la inserción del producto: " . mysqli_error($conn);
            }
            $_SESSION['message']='Producto eliminado satisfactoriamente';
            $_SESSION['message_type']='danger';
            header("Location: list_products.php");    
    }

?>