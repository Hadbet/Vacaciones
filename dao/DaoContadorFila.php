<?php


include_once('DataBase/Vacaciones.php');

ContadorFila();

function ContadorFila()
{
    $con = new LocalConector();
    $conex = $con->conectar();
    $datos = mysqli_query($conex, "SELECT COUNT(`IdFila`) as Conteo FROM `FilaVirtual` WHERE `Estatus`='1';");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}

?>

