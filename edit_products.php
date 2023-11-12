<?php

    include("db.php");
    
    if (isset($_GET["id"])) {

        $cod= $_GET["id"];
        $query = "SELECT NOMBRE_PRODUCTO,PRECIO_PUBLICO_PRD,PRECIO_COMPRA_PRD,FECHA_VENCIMIENTO_PRD, 
                PRODUCTO_CANTIDAD,LABORATORIO FROM producto WHERE COD_PRODUCTO=$cod;";
        $result = mysqli_query($conn,$query);
            if (mysqli_num_rows($result) ==1) {
                $row = mysqli_fetch_array($result);
                $nombre=$row['NOMBRE_PRODUCTO'];
                $precioPublico =  $row["PRECIO_PUBLICO_PRD"];
                $precioCompra =  $row["PRECIO_COMPRA_PRD"];
                $fecha = $row['FECHA_VENCIMIENTO_PRD'];
                $cantidad =  $row["PRODUCTO_CANTIDAD"];
                $laboratorio = $row['LABORATORIO'];
            }

    }
    if (isset($_POST["update_product"])) {
        
        $cod_prodcuto= $_GET["cod_producto"];
        $nombre=$_POST['nombre'];
        $precioPublico =  intval($_POST["precioPublico"]);;
        $precioCompra =  intval($_POST["precioCompra"]);;
        $fecha = $_POST['fecha'];
        $cantidad =  intval($_POST["cantidad"]);;
        $laboratorio = $_POST['laboratorio'];
        $query = "UPDATE PRODUCTO SET 
            NOMBRE_PRODUCTO =$nombre,
            PRECIO_PUBLICO_PRD=$precioPublico ,
            PRECIO_COMPRA_PRD=$precioCompra,
            FECHA_VENCIMIENTO_PRD= STR_TO_DATE($fecha, '%Y-%m-%d'),
            PRODUCTO_CANTIDAD=$cantidad ,
            LABORATORIO=$laboratorio WHERE COD_PRODUCTO=$cod_producto ";
        $result = mysqli_query($conn, $query);
        $_SESSION['message']='Producto actualizado ';
        $_SESSION['message_type']='warning';
        header("Location: list_products.php");
            
            
    }
?>
<?php 
    include("includes/headerEdit.php");
?>
<div class= "container p-3">
            <div class="card card-body" style="border: 2px solid #369cdd;">
                <form action="edit_products.php?id=<?php echo $_GET['id'];?>" method="POST">
                <div class="form-group mb-3">
                        <label for="Precio compra">Nombre del producto</label>
                        <input type="text" name="nombre" class="form-control" value=<?php $nombre?>  >
                    </div>
                    <div class="form-group mb-3">
                        <label for="Precio compra">Precio de venta</label>
                        <input type="text" name="precioPublico" row = '2' class="form-control" value=<?php $precioCompra?> >
                    </div>
                    <div class="form-group mb-3">
                        <label for="Precio público">Precio de compra</label>
                        <input type="text" name="precioCompra" row = '3' class="form-control" value=<?php $precioPublico?>  >
                    </div>
                    <div class="form-group mb-3">
                        <label for="fecha">Selecciona una fecha:</label>
                        <input type="date" id="fecha" row = '4' name="fecha" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Precio compra">Cantidad de existencias</label>
                        <input type="text" name="cantidad" row = '5' class="form-control" value=<?php $cantidad?> >
                    </div>
                    <div class="form-group mb-3">
                        <label for="Precio compra">Laboratorio</label>
                        <input type="text" name="laboratorio" row = '6' class="form-control" value=<?php $laboratorio?> >
                    </div>
                    <div class="btn-group">
                        <input type="submit" class="btn btn-success custom-btn" name="update_product" value="Guardar">
                        <a href="list_products.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </div>
                </form>
            </div>
</div>
<?php 
    include("includes/footer.php");
?>