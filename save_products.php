<?php

    include("db.php");
    
    if (isset($_POST["save_product"])) {
        $required_fields = ['nombre', 'precioPublico', 'precioCompra', 'fecha', 'cantidad', 'laboratorio'];

        foreach ($required_fields as $field) {
            if (empty($_POST[$field])) {
                $_SESSION['message']='Tiene que completar los campos requeridos';
                $_SESSION['message_type']='danger';
                header("Location: crear_productos.php");
                exit();
            }
        }
        // Verificar tipos de datos
        if (!is_numeric($_POST['precioPublico'])) {
            $_SESSION['message']='El precio público de venta NO puede ser caracter';
            $_SESSION['message_type']='danger';
            header("Location: crear_productos.php");
            exit();
        }
        elseif(!is_numeric($_POST['precioCompra'])){
            $_SESSION['message']='El precio público de compra NO puede ser caracter';
            $_SESSION['message_type']='danger';
            header("Location: crear_productos.php");
            exit();
        }
        else{
            if (!is_numeric($_POST['cantidad'])) {
                $_SESSION['message']='La cantidad de productos NO puede ser caracter';
                $_SESSION['message_type']='danger';
                header("Location: crear_productos.php");
                exit();
            }
        }
       
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