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
if ($rol === '1') {
	header("Location: lista.php");
}
include "conexion.inc.php";
$id=$_GET["id"];
$sql2="delete from propiedad where id='".$id."'";
$resultado=mysqli_query($con, $sql2);
header("location:lista.php");
?>