<?php

include_once('DataBase/Vacaciones.php');

$data = json_decode(file_get_contents('php://input'), true);

$arrayDatos = $data['arrayDatos'];
$otrosDatos = $data['otrosDatos'];

$Token = $otrosDatos['token'];
$ShiftLeader = $otrosDatos['shiftleader'];
$TipoOperacion = $otrosDatos['tipoOperacion'];
$Operacion = $otrosDatos['Operacion'];

foreach ($arrayDatos as $Valor) {
    registroVacaciones($Token, $ShiftLeader, $TipoOperacion, $Operacion);
}
function registroVacaciones($Token, $ShiftLeader, $TipoOperacion, $Operacion)
{

    $con = new LocalConector();
    $conex = $con->conectar();

    $Object = new DateTime();
    $Object->setTimezone(new DateTimeZone('America/Denver'));
    $DateAndTime = $Object->format("Y/m/d h:i:s");

    $insertRegistro = "INSERT INTO `PeticionVacaciones`(`ShiftLeader`, `TipoOperacion`, `Operacion`, `Token`, `FechaRegistro`) VALUES ('$ShiftLeader','$TipoOperacion','$Operacion','$Token','$DateAndTime')";

    $rsinsertUsu = mysqli_query($conex, $insertRegistro);
    mysqli_close($conex);

    if (!$rsinsertUsu) {
        echo "0";
    } else {
        echo "Si funciona";
        return 1;
    }
}

?>
