<?php include("db.php") ?>
<?php include("includes/headerSave.php") ?>

<div class="container p-3">
    
        <?php if(isset($_SESSION['message_type'])){?>
            
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php session_unset();}?>
                
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
                        <label for="fecha">Fecha de vencimiento</label>
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
                    <div class="btn-group">
                        <input type="submit" class="btn btn-success custom-btn" name="save_product" value="Guardar">
                        <a href="list_products.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </div>
                </form>
        </div>

</div>
<?php include("includes/footer.php") ?>