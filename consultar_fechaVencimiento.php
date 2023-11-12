<?php include("db.php") ?>
<?php include("includes/headerDate.php") ?>
<div class="container p-3">
            <div class="mb-3">
                <a href="list_products.php" class="btn btn-secondary">Cancelar</a>
            </div>
            <?php if(isset($_SESSION['message_type'])){?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();}?>
            <div class="table-responsive ">
                        <table class="table table-striped rounded">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio de venta</th>
                                    <th>Fecha de vencimiento</th>
                                    <th>Cantidad</th>
                                    <th>Laboratorio</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $query2 = "SELECT NOMBRE_PRODUCTO, PRECIO_PUBLICO_PRD, FECHA_VENCIMIENTO_PRD, PRODUCTO_CANTIDAD, LABORATORIO FROM PRODUCTO WHERE FECHA_VENCIMIENTO_PRD < CURDATE();"; 
                                $result= mysqli_query($conn,$query2);  
                                 while($row = mysqli_fetch_array($result)){?>
                                            <tr>
                                                <td><?php echo $row['NOMBRE_PRODUCTO'] ?></td>
                                                <td><?php echo $row["PRECIO_PUBLICO_PRD"]?></td>
                                                <td><?php echo  $row['FECHA_VENCIMIENTO_PRD']?></td>
                                                <td><?php echo $row['PRODUCTO_CANTIDAD'] ?></td>
                                                <td><?php echo $row['LABORATORIO']?></td>
                                            
                                                <td> </td>
                                            </tr>
                                            <?php } ?>  
                                            
                                           
                            </tbody>
                        </table>
            </div>
</div>
<?php include("includes/footer.php") ?>





















               
    
