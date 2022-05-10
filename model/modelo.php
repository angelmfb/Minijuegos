<?php
    class Modelo {
        public $conexion;

        
        function __construct(){
            require_once __DIR__. "/../configuracion/configdb.php";
            //Conexion con la base de datos
            $this->conexion=new mysqli(SERVERNAME,USERNAME,PASSWORD,DATABASE); 
        }

        
        function alta($nombre,$icono,$ruta){
            //Sentencia sql 
            $consulta="INSERT INTO minijuego (nombre,icono,ruta) VALUES ($nombre,$icono,$ruta);";
            //Realizo la consulta 
            $this->conexion->query($consulta);
        }
 
        
        function listar(){
            //Sentencia sql 
            $consulta="SELECT * FROM minijuego";
            //Realizo la consulta
            $resultado=$this->conexion->query($consulta);
            return $resultado;
        }
  
        
        function consultar($id){
            //Sentencia sql 
            $consulta="SELECT * FROM minijuego WHERE id=$id";
            //Realizo la consulta
            $resultado=$this->conexion->query($consulta);
            return $resultado;
        }

        
        function borrar($id){
            //Sentencia sql 
            $consulta="DELETE FROM minijuego WHERE id=$id";
            $this->conexion->query($consulta);
        }

        
        function editar($id,$nombre,$icono,$ruta){
            //Sentencia sql 
            $consulta="UPDATE minijuego SET nombre=$nombre,icono=$icono,ruta=$ruta WHERE id=$id";
            $this->conexion->query($consulta);
        }
    }
?>