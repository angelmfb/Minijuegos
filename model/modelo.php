<?php
    class Modelo {
        public $conexion;

        
        function __construct(){
            require_once __DIR__. "/../configuracion/configdb.php";
            $this->conexion=new mysqli(SERVERNAME,USERNAME,PASSWORD,DATABASE); //Realizo la conexion con la base de datos
        }

        
        function alta($nombre,$icono,$ruta){
            //Sentencia sql para realizar el alta
            $sql="INSERT INTO minijuego (nombre,icono,ruta) VALUES ($nombre,$icono,$ruta);";
            //Realizo la consulta en la base de datos
            $this->conexion->query($sql);
        }
 
        
        function listar(){
            //Sentencia sql para listar minijuegos
            $sql="SELECT * FROM minijuego";
            //Realizo la consulta en la base de datos
            $resultado=$this->conexion->query($sql);
            //Retorno los datos que me devuelve la consulta
            return $resultado;
        }
  
        
        function consultar($id){
            //Sentencia sql para mostrar el minijuego seleccionado por id
            $sql="SELECT * FROM minijuego WHERE id=$id";
            //Realizo la consulta en la base de datos
            $resultado=$this->conexion->query($sql);
            //Retorno los datos que me devuelve la consulta
            return $resultado;
        }

        
        function borrar($id){
            //Sentencia sql para borrar el minijuego seleccionado por id
            $sql="DELETE FROM minijuego WHERE id=$id";
            //Realizo la consulta en la base de datos
            $this->conexion->query($sql);
        }

        
        function editar($id,$nombre,$icono,$ruta){
            //Sentencia sql para editar el minijuego según el id
            $sql="UPDATE minijuego SET nombre=$nombre,icono=$icono,ruta=$ruta WHERE id=$id";
            //Realizo la consulta en la base de datos
            $this->conexion->query($sql);
        }
    }

?>