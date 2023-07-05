<?php
include_once('../DataBase/Vacaciones.php');

//$Token = $_GET['6486f0e4'];

actualizarEstatus();
function actualizarEstatus()
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $Object = new DateTime();
    $Object->setTimezone(new DateTimeZone('America/Denver'));
    $DateAndTime = $Object->format("Y/m/d h:i:s");

    $updateFechaCorte = "UPDATE `FilaVirtual` SET `Estatus`='0' WHERE `FechaCorte`<= '$DateAndTime' AND FechaCorte != '0000-00-00 00:00:00' AND Estatus = 1;";
    $updateFechaEstimada = "UPDATE `FilaVirtual` SET `Estatus`='0' WHERE `FechaEstimada`<= '$DateAndTime' AND Estatus = 1;";

    echo $updateFechaCorte;
    echo $updateFechaEstimada;

    $success = true;

    $rsUpdateFechaCorte = mysqli_query($conex, $updateFechaCorte);
    if (!$rsUpdateFechaCorte) {
        $success = false;
    }

    $rsUpdateFechaEstimada = mysqli_query($conex, $updateFechaEstimada);
    if (!$rsUpdateFechaEstimada) {
        $success = false;
    }

    mysqli_close($conex);

    if ($success) {
        echo '{"data":[{"Estatus":"1"}]}';
    } else {
        echo '{"data":[{"Estatus":"0"}]}';
    }
}

?>
