<?php
    class Modelo {
        public $conexion;
        function __construct(){
            require_once __DIR__. '/../php/conexion.php';
            $conexion=new Conexion();
            $this->conexion=$conexion->conexion();
        }
        function consultar($consulta){
            return $this->conexion->query($consulta);
        }
        function alta(){
            $nombre=$_POST['nombre'];
            $icono=$_POST['icono'];
            $ruta=$_POST['ruta'];
            $consulta="INSERT INTO minijuego (nombre,icono,ruta) VALUES ('$nombre','$icono','$ruta');";
            if($this->consultar($consulta)){
                echo('Consulta realizada');
            }else{
                echo('La consulta no se realizó correctamente');
            }
        }
    }
?>