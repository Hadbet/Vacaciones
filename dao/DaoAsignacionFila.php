<?php

include_once('DataBase/Vacaciones.php');
function registroUsu($Token,$Turno,$DateAndTime){

    $con = new LocalConector();
    $conex=$con->conectar();

    $insertRegistro= "INSERT INTO `FilaVirtual`(`Token`, `Turno`, `Fecha`, `Estatus`) VALUES ('$Token','$Turno','$DateAndTime','1')";

    $rsinsertUsu=mysqli_query($conex,$insertRegistro);
    mysqli_close($conex);

    if(!$rsinsertUsu){
        echo "0";
        return 0;
    }else{
        echo "Si funciona";
        return 1;
    }
}
function obtenerValorConsultaAux() {
    $con = new LocalConector();
    $conex = $con->conectar();

    $consulta = "SELECT `Turno` FROM `FilaVirtual` order by `IdFila` desc LIMIT 1;";

    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $valor = $fila['Turno'];
        mysqli_free_result($resultado);
        mysqli_close($conex);
        return $valor;
    } else {
        mysqli_close($conex);
        return 0;
    }
}