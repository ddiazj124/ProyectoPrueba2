<?php
include '../Constantes.php';
include '../Librerias.php';
?>

<?php
$nombreProducto = $_POST['nombreProducto'];
$totalProducto = $_POST['totalProducto'];
$anioProducto = $_POST['anioProducto'];


//Iniciar la Conexion
$oConn = new Conexion();
$oConn->Conectar();
$bd = $oConn->objconn;

$sql="insert into productos(NOMBRE, TOTALUSD, ANO) values ('$nombreProducto','$totalProducto','$anioProducto')";
$resultado = $bd->query($sql);

if($resultado)
{
    echo 'Ingresado';
}
else
{
    echo 'No ingresado';
}

//Agregar Acciones a LOGTRANSACCIONES
$oLT = new LogTransaccion();
$oLT->idacceso=1;
$oLT->nomtabla='Productos';
$oLT->descripcion='Ingreso de producto '.$nombreProducto.' a la tabla Productos';
$oLT->accion='I';

$oLT->Agregar();



