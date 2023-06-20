<?php
include_once('DataBase/Vacaciones.php');

$Token = $_GET['6486f0e4'];

actualizarEstatus($Token);
function actualizarEstatus($Token)
{

    $con = new LocalConector();
    $conex = $con->conectar();

    $insertRegistro = "UPDATE `FilaVirtual` SET `Estatus`='0' WHERE `Token` = '$Token'";

    $rsinsertUsu = mysqli_query($conex, $insertRegistro);
    mysqli_close($conex);

    if (!$rsinsertUsu) {
        echo '{"data":[{"Estatus":"0"}]}';
    } else {
        echo '{"data":[{"Estatus":"1"}]}';
    }
}

?>
