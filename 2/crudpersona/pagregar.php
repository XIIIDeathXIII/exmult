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
$id = $_GET["id"];
?>
<form method="GET" action = "pagregarg.php">
	  <input type="hidden" name="id" value="<?php echo $id ?>"/>
		<br>
	  direccion
	  <input type="text" name="direccion" value=""/>
	   <br>
	  codigo catastral
	  <input type="text" name="codigo" value=""/>
	   <br>
	  <input type="submit" name="guardar" value="guardar"/>