<?php

    include("db.php");
    
    
    if (isset($_POST["save_product"])) {
        $mensaje = "Hola, esto es un mensaje de prueba en PHP.";

        // Enviar el mensaje a los registros de error
        error_log($mensaje);
        
        $nombre=$_POST['nombre'];
        $precioPublico =  intval($_POST["precioPublico"]);;
        $precioCompra =  intval($_POST["precioCompra"]);;
        $fecha = $_POST['fecha'];
        $cantidad =  intval($_POST["cantidad"]);;
        $laboratorio = $_POST['laboratorio'];
/*
        $query="INSERT INTO PRODUCTO (
            COD_CATEGORIA,
            NOMBRE_PRODUCTO,
            PRECIO_PUBLICO_PRD,
            PRECIO_COMPRA_PRD,
            FECHA_VENCIMIENTO_PRD,
            PRODUCTO_CANTIDAD,
            LABORATORIO) 
            VALUES (
                '1',
                '$nombre',
                '$precioPublico',
                '$precioCompra',
                '$fecha',
                '$cantidad',
                '$laboratorio'
            );";
            $result=mysql_query($conn,$query);
            if(!$result){
                die("Query failed");
            }

*/
            ////////////////
            
            $query = "INSERT INTO PRODUCTO (COD_CATEGORIA, NOMBRE_PRODUCTO, PRECIO_PUBLICO_PRD, PRECIO_COMPRA_PRD, FECHA_VENCIMIENTO_PRD, PRODUCTO_CANTIDAD, LABORATORIO) 
              VALUES (?, ?, ?, ?, STR_TO_DATE(?, '%Y-%m-%d'), ?, ?)";
                if(isset($conn)){
                    echo'sisas';
                }
                $stmt = mysqli_prepare($conn, $query);
                $categoria = 1;
            // Vincular parámetros
            mysqli_stmt_bind_param($stmt, "isiisis", $categoria, $nombre, $precioPublico, $precioCompra, $fecha, $cantidad, $laboratorio);

            if(isset($conn)){
                echo'sisas2';
            }
            if (mysqli_stmt_execute($stmt)) {
                echo "Producto insertado exitosamente";
            } else {
                echo "Error en la inserción del producto: " . mysqli_error($conn);
            }

            // Cerrar la consulta y la conexión
            mysqli_stmt_close($stmt);
            
    }

?>