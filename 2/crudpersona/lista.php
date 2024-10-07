<?php
session_start();

if (!isset($_SESSION['rol'])) {
    header("Location: ../login.php");
    exit();
}

$rol = $_SESSION['rol'];

$ida = $_GET['usuario'];


if (isset($_GET['cerrar_sesion'])) {
    session_unset();
    session_destroy();
    header("Location: lista.php");
    exit();
}



$con = mysqli_connect("localhost","usuario","123456789");
mysqli_select_db($con,"bdgerardo");	
$sql="select * from persona";
$resultado=mysqli_query($con,$sql);
?>
<button onclick="window.location.href='?cerrar_sesion=true'">cerrar sesion</button>
<table border="1px">
<tr>
	<td>id</td>
	<td>nombre</td>
<?php
	if ($rol === '2') {		
	echo "<td>editar</td>";
    echo "<td>eliminar</td>";
	};
?>
    <td>propiedades</td>
</tr>
<?php
while ($fila=mysqli_fetch_array($resultado))
{
	echo "<tr>";
	echo "<td>".$fila['id']."</td>";
	echo "<td>".$fila['nombre']."</td>";
	if ($rol === '2') {	
	echo "<td><a href='editar.php?id=".$fila['id']."'>editar </a></td>";
	echo "<td><a href='eliminar.php?id=".$fila['id']."'>eliminar</a></td>";
	}
    echo "<td><a href='propiedad.php?id=".$fila['id']."'>propiedades</a></td>";
	echo "</tr>";
   
	
}
if ($rol === '2') {	
echo "<a href='agregar.php'>agregar</a>";
}
?>
</table>