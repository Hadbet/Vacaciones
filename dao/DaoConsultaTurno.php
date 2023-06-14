<?php
include_once('DataBase/Vacaciones.php');


$TurnoAux = obtenerValorConsulta();

if ($TurnoAux!="0"){
    Contador();
}else{
    echo '{"data":[{"IdFila":"No","Token":"No","Turno":"No","Fecha":"2023-06-14 11:48:06","Estatus":"1"}]}';
}

function obtenerValorConsulta() {
    $con = new LocalConector();
    $conex = $con->conectar();

    $consulta = "SELECT `Turno` FROM `FilaVirtual` where `Estatus` = 2 order by `IdFila` desc LIMIT 1;";

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

function Contador()
{
    $con = new LocalConector();
    $conex = $con->conectar();
    $datos = mysqli_query($conex, "SELECT * FROM `FilaVirtual` WHERE `Estatus` = 1 order by `Turno` asc LIMIT 1;");
    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}

?>
