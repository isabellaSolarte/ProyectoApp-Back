<?php

    include("db.php");
    
    if (isset($_POST["save_product"])) {
        
        $nombre=$_POST['nombre'];
        $precioPublico =  intval($_POST["precioPublico"]);;
        $precioCompra =  intval($_POST["precioCompra"]);;
        $fecha = $_POST['fecha'];
        $cantidad =  intval($_POST["cantidad"]);;
        $laboratorio = $_POST['laboratorio'];

            $query = "INSERT INTO PRODUCTO (COD_CATEGORIA, NOMBRE_PRODUCTO, PRECIO_PUBLICO_PRD, PRECIO_COMPRA_PRD, FECHA_VENCIMIENTO_PRD, PRODUCTO_CANTIDAD, LABORATORIO) 
              VALUES (?, ?, ?, ?, STR_TO_DATE(?, '%Y-%m-%d'), ?, ?)";
                
                $stmt = mysqli_prepare($conn, $query);
                $categoria = rand(1, 10);;
            
            mysqli_stmt_bind_param($stmt, "isiisis", $categoria, $nombre, $precioPublico, $precioCompra, $fecha, $cantidad, $laboratorio);

            if (mysqli_stmt_execute($stmt)) {
                echo "Producto insertado exitosamente";
                $_SESSION['message']='Producto guardado';
                $_SESSION['message_type']='success';
                header("Location: index.php");
            } else {
                echo "Error en la inserción del producto: " . mysqli_error($conn);
            }

        

            
            
    }

?>