<?php
class LocalConector{
    private $host = "127.0.0.1:3306";
    private $usuario = "u543707098_Grammer";
    private $clave = "Grammer1";
    private $db = "u543707098_RH";
    public $conexion;
    public function conectar(){
        $con = mysqli_connect($this->host,$this->usuario,$this->clave,$this->db);
        return $con;
    }
}
?>
