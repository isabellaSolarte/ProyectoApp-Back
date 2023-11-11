<?php

    include("db.php");
    if (isset($_POST["save_product"])) {
        $nombre=$_POST['nombre'];
        $precioPublico = $_POST['precioPublico'];
        $precioCompra = $_POST['precioCompra'];
        $fecha = $_POST['fecha'];
        $cantidad = $_POST['cantidad'];
        $laboratorio = $_POST['laboratorio'];

        $queryProduct='';
    }

?>