<?php
session_start();

if (isset($_SESSION['rol'])) {
    header("Location: crudpersona/lista.php");
    exit();
}


include "conexion.inc.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST["nombreUsuario"];
    $pass = $_POST["pass"];

    $query = "SELECT * FROM persona WHERE usuario = '$nombreUsuario'";
    $resultado = mysqli_query($con, $query);

    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);

        if ($pass== $fila["pass"]) {
            $_SESSION['rol'] = $fila["rol"];
            header("Location: crudpersona/lista.php?usuario=".$nombreusuario);
            exit();
        } else {
            $error = "pass incorrecta.";
			
        }
    } else {
        $error = "Nombre de usuario incorrecto.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
</head>
<body>
    <h1>Inicio de Sesión</h1>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nombre de Usuario: <input type="text" name="nombreUsuario" required><br>
        pass: <input type="password" name="pass" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
	<a href="crudpersona/agregar.php">Crear cuenta</a>
</body>
</html>