<?php include("db.php") ?>
<?php include("includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body" style="border: 2px solid #369cdd;">
                <form action="save_products.php" method="POST">
                    <div class="form-group mb-3">
                        <label for="Precio compra">Nombre del producto</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre producto" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Precio compra">Precio de venta</label>
                        <input type="text" name="precioPublico" row = '2' class="form-control" placeholder="Precio público" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Precio compra">Precio de compra</label>
                        <input type="text" name="precioCompra" row = '3' class="form-control" placeholder="Precio compra" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fecha">Selecciona una fecha:</label>
                        <input type="date" id="fecha" row = '4' name="fecha" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Precio compra">Cantidad de existencias</label>
                        <input type="text" name="cantidad" row = '5' class="form-control" placeholder="Cantidad" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Precio compra">Laboratorio</label>
                        <input type="text" name="laboratorio" row = '6' class="form-control" placeholder="Laboratorio" autofocus>
                    </div>
                    <input type="submit" class="btn btn-success custom-btn" name="save_product" value="Guardar">
                </form>
            </div>

        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>


 