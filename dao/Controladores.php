<?php

require 'DaoAsignacionFila.php';

if (isset($_POST['btnFila'])) {

    $Nomina = $_POST['usuario'];

    if (strlen($Nomina) == 1) {
        $Nomina = "0000000" . $Nomina;
    }
    if (strlen($Nomina) == 2) {
        $Nomina = "000000" . $Nomina;
    }
    if (strlen($Nomina) == 3) {
        $Nomina = "00000" . $Nomina;
    }
    if (strlen($Nomina) == 4) {
        $Nomina = "0000" . $Nomina;
    }
    if (strlen($Nomina) == 5) {
        $Nomina = "000" . $Nomina;
    }
    if (strlen($Nomina) == 6) {
        $Nomina = "00" . $Nomina;
    }
    if (strlen($Nomina) == 7) {
        $Nomina = "0" . $Nomina;
    }

    $Object = new DateTime();
    $Object->setTimezone(new DateTimeZone('America/Denver'));
    $DateAndTime = $Object->format("Y/m/d h:i:s");
    $DateId = $Object->format("Ymdhis");

    $Turno = obtenerValorConsultaAux() + 1;
    $Token = $Nomina . "-" . $Turno . "-" . $DateId;

    $ObjectAux = new DateTime();
    $ObjectAux->setTimezone(new DateTimeZone('America/Denver'));

    $intervalo = new DateInterval('PT' . ($Turno * 5) . 'M');
    $ObjectAux->add($intervalo);

    $DateAux = $ObjectAux->format("Y/m/d h:i:s");



    $statusLogin = registroUsu($Token, $Turno, $DateAndTime,$DateAux);

    if ($statusLogin == 1) {
        $_SESSION['token'] = $Token;
        $_SESSIOM['turno'] = $Turno;

        echo $_SESSION['token'];
        echo $_SESSION['turno'];

        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../fila.php'>";
    } else if ($statusLogin == 0) {
        echo "<script>alert('Acceso Denegado')</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../login.html'>";
    }
}

?>