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
$sql="select * from persona where id='".$id."'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
  

?>
<form method="GET" action = "editarg.php">
      
	  <input type="hidden" name="id" value="<?php echo $fila['id'];?>"/>
	   <br>
	  nombre
	  <input type="text" name="nombre" value="<?php echo $fila['nombre'];?>"/>
	   <br>
	  usuario
	  <input type="text" name="usuario" value="<?php echo $fila['usuario'];?>"/>
	   <br>
	  contraseña
	  <input type="text" name="contraseña" value="<?php echo $fila['pass'];?>"/>
	   <br>
	   Rol actual <?php if ($fila['rol']==1){echo "usuario";}else{echo "funcionario";}?>
	   <br>
		<select name="rol">
		<option value="1">Usuario</option>
		<option value="2">Funcionario</option>
		</select>
		<br>

	  <input type="submit" name="guardar" value="guardar"/>