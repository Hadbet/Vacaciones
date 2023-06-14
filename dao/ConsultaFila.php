<?php


include_once('DataBase/Vacaciones.php');

$TipoEncargado = $_GET['tipoEncargado'];

Contador($TipoEncargado);

function Contador($TipoEncargado)
{
    $con = new LocalConector();
    $conex = $con->conectar();
    $datos = mysqli_query($conex, "SELECT * FROM `BitacoraBonosSalida` WHERE `ConfirmacionEncargado` = '1' and ConfirmacionPlant = 0  and ConfirmacionEhs not like '2' and ConfirmacionEncargado not like '2' and ConfirmacionControlling not like '2';");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}

?>

