<?php

include_once('DataBase/Vacaciones.php');

$data = json_decode(file_get_contents('php://input'), true);

$arrayDatos = $data['arrayDatos'];
$otrosDatos = $data['otrosDatos'];

$Token = $otrosDatos['Token'];
$ShiftLeader = $otrosDatos['ShiftLeaderAux'];
$Operacion = $otrosDatos['OperacionAux'];

foreach ($arrayDatos as $Valor) {
    registroVacaciones($Token, $ShiftLeader, $Operacion,$Valor);
}
function registroVacaciones($Token, $ShiftLeader, $Operacion,$Valor)
{

    $con = new LocalConector();
    $conex = $con->conectar();

    $Object = new DateTime();
    $Object->setTimezone(new DateTimeZone('America/Denver'));
    $DateAndTime = $Object->format("Y/m/d h:i:s");

    $insertRegistro = "INSERT INTO `PeticionVacaciones`(`ShiftLeader`, `TipoOperacion`, `Operacion`, `Token`, `FechaRegistro`,`FechaVacaciones`) VALUES ('$ShiftLeader','','$Operacion','$Token','$DateAndTime','$Valor')";

    $rsinsertUsu = mysqli_query($conex, $insertRegistro);
    mysqli_close($conex);

    if (!$rsinsertUsu) {
        echo $insertRegistro;
    } else {
        echo "Si funciona";
        return 1;
    }
}

?>
