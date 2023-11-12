<?php include("db.php") ?>
<?php include("includes/headerProveedor.php") ?>
<div class="container p-3">
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
                                    <th>ID proveedor</th>
                                    <th>Proveedor</th>
                                    <th>ID producto</th>
                                    <th>Producto</th>
                                    <th>Correo</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                        $query2 = "SELECT
                                                    P.COD_PRODUCTO,
                                                    P.NOMBRE_PRODUCTO,
                                                    PV.COD_PROVEEDOR,
                                                    PV.NOMBRE_PROVEEDOR,
                                                    PV.CORREO_PROVEEDOR
                                                FROM
                                                    DISTRIBUCION D
                                                JOIN
                                                    PRODUCTO P ON D.COD_PRODUCTO = P.COD_PRODUCTO
                                                JOIN
                                                    PROVEEDOR PV ON D.COD_PROVEEDOR = PV.COD_PROVEEDOR;";     
                                                $result= mysqli_query($conn,$query2);  
                                                while($row = mysqli_fetch_array($result)){    
                                        ?>
                                            <tr>
                                                <td><?php echo $row["COD_PROVEEDOR"] ?></td>
                                                <td><?php echo $row["NOMBRE_PROVEEDOR"]?></td>
                                                <td><?php echo $row['COD_PRODUCTO']?></td>
                                                <td><?php echo $row['NOMBRE_PRODUCTO']?></td>
                                                <td><?php echo $row['CORREO_PROVEEDOR']?></td>
                                            
                                                <td> </td>
                                            </tr>
                                            <?php } ?>  
                                            
                                           
                            </tbody>
                        </table>
            </div>
</div>
<?php include("includes/footer.php") ?>
