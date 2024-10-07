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

if ($rol === 1) {

	header("Location: crudpersona/lista.php");

}

if ($rol === '1') {
	header("Location: lista.php");
}

include "conexion.inc.php";
$direccion=$_GET["direccion"];
$codigo=$_GET["codigo"];
$id=$_GET["id"];
$sql = "insert into propiedad (`direccion`,
 `codigo_catastral`, `persona_id`) values ( 
'".$direccion."',
'".$codigo."',    
'".$id."')";
echo($sql);
$resultado=mysqli_query($con, $sql);
header("Location: lista.php");
?>