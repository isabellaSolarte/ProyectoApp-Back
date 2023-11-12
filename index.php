<?php 

  if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
  }
  include("db.php");


  if (!empty($_POST['user']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT CC_USUARIO, LOGIN_USUARIO, CONTRASENIA_USUARIO FROM TRABAJADOR WHERE LOGIN_USUARIO = ?');
    $records->bind_param('s', $_POST['user']);
    $records->execute();
    $records->bind_result($codTrabajador, $loginUsuario, $contraseniaUsuario);
    $records->fetch();

    if ($records->num_rows > 0 && password_verify($_POST['password'], $contraseniaUsuario)) {
        $_SESSION['user_id'] = $codTrabajador;
        header("Location: list_products.php");
        exit();
    } else {
        $message = 'Sorry, those credentials do not match';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Animated Login Form</title>
	<link rel="stylesheet" href="assets/css/styleLogin.css">
</head>
<body>
	<div class="box">
		<form action="index.php" autocomplete="off" method="POST">
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
