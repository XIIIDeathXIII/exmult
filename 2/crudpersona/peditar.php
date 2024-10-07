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
$sql="select * from propiedad where id='".$id."'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
?>
<form method="GET" action = "peditarg.php">
      
	  <input type="hidden" name="id" value="<?php echo $fila['id'];?>"/>
	   <br>
	  direccion
	  <input type="text" name="direccion" value="<?php echo $fila['direccion'];?>"/>
	   <br>
	  codigo catastral
	  <input type="text" name="codigo" value="<?php echo $fila['codigo_catastral'];?>"/>
	   <br>
	  propietario
	  <input type="text" name="persona" value="<?php echo $fila['persona_id'];?>"/>
	   <br>
	  <input type="submit" name="guardar" value="guardar"/>