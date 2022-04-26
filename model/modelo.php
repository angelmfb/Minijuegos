<?php
    class Modelo {
        public $conexion;
        function __construct(){
            require_once __DIR__. "/../configuracion/configdb.php";
            //Realizo la conexion con la base de datos
            $this->conexion=new mysqli(SERVERNAME,USERNAME,PASSWORD,DATABASE); 
        }
        function consultar($consulta){
            return $this->conexion->query($consulta);
        }
        //Realizar la consulta del alta 
        function alta(){
            $nombre=$_POST['nombre'];
            $icono=$_POST['icono'];
            $ruta=$_POST['ruta'];
            if(empty($_POST['icono'])){
                $consulta="INSERT INTO minijuego (nombre,icono,ruta) VALUES ('".$_POST['nombre']."',NULL,'".$_POST['ruta']."');";
            }else{
                $consulta="INSERT INTO minijuego (nombre,icono,ruta) VALUES ('".$_POST['nombre']."','".$_POST['icono']."','".$_POST['ruta']."');";
            }
            if($this->consultar($consulta)){
                echo('Consulta realizada');
            }else{
                echo('La consulta no se realizó correctamente');
            }
        }
    }
?>