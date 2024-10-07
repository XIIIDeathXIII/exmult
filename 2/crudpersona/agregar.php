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

?>
<form method="GET" action = "agregarg.php">

	  nombre
	  <input type="text" name="nombre" value=""/>
	   <br>
	  usuario
	  <input type="text" name="usuario" value=""/>
	   <br>
	  contraseña
	  <input type="text" name="contraseña" value=""/>
	   <br>
	   Rol:
		<select name="rol">
		<option value="1">Usuario</option>
		<option value="2">Funcionario</option>
		</select>
		<br>
	  <input type="submit" name="guardar" value="guardar"/>