<?php
    //LLamamos al archivo donde se encuentran las constantes de la base de datos
    require_once __DIR__. '/configdb.php';

    class Conexion {
        private $conexion=null;
        //Inicio la conexion con la base de datos
        function conexion(){
            return $this->conexion=new mysqli(SERVERNAME,USERNAME,PASSWORD,DATABASE);
        }
    }
?>