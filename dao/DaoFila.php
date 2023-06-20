<?php

include_once('DataBase/Vacaciones.php');

$data = json_decode(file_get_contents('php://input'), true);

$arrayDatos = $data['arrayDatos'];
$otrosDatos = $data['otrosDatos'];

$Token = $otrosDatos['token'];
$ShiftLeader = $otrosDatos['shiftleader'];
$TipoOperacion = $otrosDatos['tipoOperacion'];
$Operacion = $otrosDatos['Operacion'];

$Turno = obtenerValorConsulta() + 1;

registroUsu($Token, $Turno);

function registroUsu($Token, $Turno)
{

    $con = new LocalConector();
    $conex = $con->conectar();

    $Object = new DateTime();
    $Object->setTimezone(new DateTimeZone('America/Denver'));
    $DateAndTime = $Object->format("Y/m/d h:i:s");

    $insertRegistro = "INSERT INTO `FilaVirtual`(`Token`, `Turno`, `Fecha`) VALUES ('$Token','$Turno','$DateAndTime')";

    $rsinsertUsu = mysqli_query($conex, $insertRegistro);
    mysqli_close($conex);

    if (!$rsinsertUsu) {
        echo "$insertRegistro";
        return 0;
    } else {
        echo "Si funciona";
        return 1;
    }
}

function obtenerValorConsulta()
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $consulta = "SELECT `Turno` FROM `FilaVirtual` order by `IdFila` desc LIMIT 1;";

    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $valor = $fila['columna'];
        mysqli_free_result($resultado);
        mysqli_close($conex);
        return $valor;
    } else {
        mysqli_close($conex);
        return 0;
    }
}


?>
