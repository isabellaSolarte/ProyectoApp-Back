<?php include("db.php") ?>
<?php include("includes/header.php") ?>
<div class="container p-3">
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
                                                        <a href="edit_products.php?id=<?php $row['COD_PRODUCTO']?>">
                                                            <button class="btn btn-editar"  title="Editar">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </button>
                                                        </a>
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
<?php include("includes/footer.php") ?>


 