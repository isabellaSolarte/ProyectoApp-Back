<?php

if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
}

include("db.php");

$message = '';

if (!empty($_GET['user']) && !empty($_GET['password'])) {
    $login=$_GET['user'];
    
    $password=$_GET['password'];
    $query="SELECT t.LOGIN_USUARIO,t.CONTRASENIA_USUARIO
            FROM
                trabajador t
            JOIN
                usuariorol ur ON t.CC_USUARIO = ur.CC_USUARIO
            JOIN
                rol r ON r.ID_ROL = ur.ID_ROL
            WHERE r.ID_ROL=1 AND t.LOGIN_USUARIO = '$login' AND t.CONTRASENIA_USUARIO='$password';";
                $result = mysqli_query($conn,$query);
            if (mysqli_num_rows($result) ==1) {
                $row = mysqli_fetch_array($result);
                $_SESSION['user_name'] = $row['LOGIN_USUARIO'];
                setcookie('cookie_name', $row['LOGIN_USUARIO'], time() + (86400 * 30), "/"); 
                header("Location: list_products.php");
                
                exit();
                
            }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Droguería</title>
    <link rel="stylesheet" href="assets/css/styleLogin.css">
</head>
<body>
    <div class="box">
        <form action="index.php" autocomplete="off" method="GET">
            <h2>Sign in</h2>
            <div class="inputBox">
                <input type="text" name="user" required="required">
                <span>Usuario</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>Contraseña</span> 
                <i></i>
            </div>
            <div class="links">
                <a href="#">Signup</a>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
