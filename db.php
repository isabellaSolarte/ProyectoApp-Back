<?php
    $conn= mysqli_connect(
        'localhost',
        'root',
        '',
        'php_mysql_crud'
    );
    if(isset($conn)){
        echo 'BD is connect';
    }
?>    