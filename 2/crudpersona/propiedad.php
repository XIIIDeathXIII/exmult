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
include "conexion.inc.php";
$id=$_GET["id"];
$sql="select * from propiedad where propiedad.persona_id='".$id."'";
$resultado=mysqli_query($con, $sql);

?>
<table border="1px">
<tr>
	<td>id</td>
	<td>direccion</td>
	<td>codigo catastral</td>
<?php	
	if ($rol === '2') {	
	echo "<td>editar</td>";
    echo "<td>eliminar</td>";
	}
?>
</tr>
<?php
while ($fila=mysqli_fetch_array($resultado))
{
	
	echo "<tr>";
	echo "<td>".$fila['id']."</td>";
	echo "<td>".$fila['direccion']."</td>";
	echo "<td>".$fila['codigo_catastral']."</td>";
	if ($rol === '2') {	
	echo "<td><a href='peditar.php?id=".$fila['id']."'>editar </a></td>";
	echo "<td><a href='peliminar.php?id=".$fila['id']."'>eliminar</a></td>";
	}
	echo "</tr>";
	
}
if ($rol === '2') {	
echo "<a href='pagregar.php?id=".$id."'>agregar</a>";
}
?>
</table>