<?php
session_start();

if (!isset($_SESSION['rol'])) {
    header("Location: ../login.php");  
      exit();
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
$nombre=$_GET["nombre"];
$nombreUsuario=$_GET["usuario"];
$contraseña=$_GET["contraseña"];
$rol=$_GET["rol"];
$sql = "insert into persona (`nombre`,
 `rol`, `usuario`, `pass`) values ( 
'".$nombre."',
'".$rol."',    
'".$nombreUsuario."',
'".$contraseña."')";
echo($sql);
$resultado=mysqli_query($con, $sql);
header("Location: lista.php");
?>