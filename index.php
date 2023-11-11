<?php include("db.php") ?>
<?php include("includes/header.php") ?>
<div class="container vh-100 p-3">
    <div class="row">
        <div class="col-md-auto ">
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
                    <input type="submit" class="btn btn-success custom-btn" name="save_product" value="Guardar">
                </form>
            </div>

        </div>
        <div class="col-md-8">
            <div class="table-responsive ">
                        <table class="table table-striped rounded">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio de venta</th>
                                    <th>Fecha de vencimiento</th>
                                    <th>Cantidad</th>
                                    <th>Laboratorio</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $query = "SELECT p.COD_PRODUCTO,p.NOMBRE_PRODUCTO,p.PRECIO_PUBLICO_PRD,p.PRECIO_COMPRA_PRD,p.FECHA_VENCIMIENTO_PRD,p.PRODUCTO_CANTIDAD,p.LABORATORIO,c.NOMBRE_CAT
                                        FROM PRODUCTO p INNER JOIN categoria c
                                        ON p.COD_CATEGORIA=c.COD_CATEGORIA;";
                                        $result= mysqli_query($conn,$query);  
                                        while($row = mysqli_fetch_array($result)){ ?>
                                            <tr>
                                                <td><?php echo $row['COD_PRODUCTO'] ?></td>
                                                <td><?php echo $row['NOMBRE_PRODUCTO'] ?></td>
                                                <td><?php echo $row['PRECIO_PUBLICO_PRD'] ?></td>
                                                <td><?php echo $row['FECHA_VENCIMIENTO_PRD'] ?></td>
                                                <td><?php echo $row['PRODUCTO_CANTIDAD'] ?></td>
                                                <td><?php echo $row['LABORATORIO'] ?></td>
                                                <td><?php echo $row['NOMBRE_CAT'] ?></td>
                                                <td>
                                                    <div class="button-container">
                                                    <button (click)="irEditar()" class="btn btn-editar"  title="Editar">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </button>
                                                
                                                    <button  class="btn btn-eliminar"  title="Eliminar" style="margin-left: 5px;">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                    </div>
                                                </td>
                                                </tr>
                                        <?php } ?>      
                            </tbody>
                        </table>
            </div>
        </div>
        
    </div>

    
</div>
<?php include("includes/footer.php") ?>


 