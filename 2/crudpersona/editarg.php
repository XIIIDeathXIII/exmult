<?php
session_start();

if (!isset($_SESSION['rol'])) {
    header("Location: ../login.php");    exit();
}

$rol = $_SESSION['rol'];



if (isset($_GET['cerrar_sesion'])) {
    session_unset();
    session_destroy();
    header("Location: crudpersona/lista.php");
    exit();
}

if ($rol === '1') {
	header("Location: lista.php");
}

include "conexion.inc.php";
$id=$_GET["id"];
$nombre=$_GET["nombre"];
$nombreUsuario=$_GET["usuario"];
$contraseña=$_GET["contraseña"];
$rol=$_GET["rol"];
$sql = "update persona set nombre='".$nombre."', usuario='".$nombreUsuario."', pass='".$contraseña."', rol='".$rol."'";
$sql.=" where id='".$id."'";
$resultado=mysqli_query($con, $sql);
header("Location: lista.php")


?>