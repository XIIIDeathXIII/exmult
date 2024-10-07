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
$direccion=$_GET["direccion"];
$codigo=$_GET["codigo"];
$persona=$_GET["persona"];
$sql = "update propiedad set direccion='".$direccion."', codigo_catastral='".$codigo."', persona_id='".$persona."'";
$sql.=" where id='".$id."'";
$resultado=mysqli_query($con, $sql);
header("Location: lista.php")
?>