<?php
    class Controlador{
        public $modelo;

        function __construct(){
            require_once __DIR__. "/../model/modelo.php";
            $this->modelo=new Modelo();
        }


        function alta(){
            include_once __DIR__. "/../views/alta.php";
            //que el nombre no este vacio
            if(empty($_POST['nombre'])){
                return "No dejes el nombre en blanco";
            }else{
                $nombre="'".$_POST['nombre']."'";
            }
            // si existe el fichero 
            if(!empty($_FILES['icono']['name'])){
                $icono="'".basename($_FILES["icono"]["name"])."'";
                $tipo=$_FILES['icono']['type'];
                $tamaño=$_FILES["icono"]["size"];
                //Comprobar imagen y tamaño
                if($tipo=='image/png'||$tipo=='image/jpg'||$tipo=='image/jpeg'){
                    if($tamaño > 20971520){
                        return "El tamaño es demasiado grande.";
                    }
                }else{
                    return "La extensión utilizada no es la adecuada";
                }
            }else{
                $icono='NULL';
            }
            //la ruta no esté vacia
            if(empty($_POST['ruta'])){
                return "No dejes la ruta en blanco";
            }else{
                $ruta="'".$_POST['ruta']."'";
            }
            //LLamo al alta para que realize la consulta
            $this->modelo->alta($nombre,$icono,$ruta);
            //Compruebo si hay filas afectadas
            if($this->modelo->conexion->affected_rows>0){
                //Muevo el archivo a la carpeta fichero
                $dir_subida=FICHERO.basename($_FILES["icono"]["name"]);
                move_uploaded_file($_FILES['icono']['tmp_name'],$dir_subida);
                //filas afectadas
                return "Hay ".$this->modelo->conexion->affected_rows." filas afectadas.";
            }else{
                //que los nombres no esten duplicados
                if($this->modelo->conexion->errno==1062){
                    return "El nombre ya existe";
                }else{
                    return "Se ha producido un error inesperado";
                }
            }
        }


        function listarMinijuego(){
            //Incluyo la vista de listar
            include_once __DIR__. "/../views/listado.php";
            //Llamo al listar del modelo para que realize la consulta
            $resultado=$this->modelo->listar();
            //Retorno a la vista los datos que me llegan del modelo
            return $resultado;
        }


        function consultarMinijuego(){
            //Incluyo la vista de consultar
            if($_GET['accion']=='borrar'){
                include_once __DIR__. "/../views/borrar.php";
            }
            if($_GET['accion']=='editar'){
                include_once __DIR__. "/../views/editar.php";
            }
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                //LLamo al método del modelo y le paso el id correspondiente que viene por URL
                $resultado=$this->modelo->consultar($id);
                return $resultado;
            }else{
                return 'Se ha producido un error';
            }
        }

        
        function borrarMinijuego($id){
            $this->modelo->borrar($id);
            if($this->modelo->conexion->affected_rows>0){
                return "Se ha eliminado correctamente";
            }else{
                return "Se ha producido un error";
            }
        }

        
        function editarMinijuego($id){
            //Compruebo que el nombre no se queda en blanco
            if(empty($_POST['nombre'])){
                return "No dejes el nombre en blanco";
            }else{
                $nombre="'".$_POST['nombre']."'";
            }
            //Compruebo si el icono está en blanco y le meto NULL y sino le pongo las comillas para después al realizar la consulta
            if(empty($_POST['icono'])){
                $icono='NULL';
            }else{
                $icono="'".$_POST['icono']."'";
            }
            //Compruebo que la ruta no se queda en blanco
            if(empty($_POST['ruta'])){
                return "No dejes la ruta en blanco";
            }else{
                $ruta="'".$_POST['ruta']."'";
            }
            $this->modelo->editar($id,$nombre,$icono,$ruta);
            if($this->modelo->conexion->affected_rows>0){
                return "Hay ".$this->modelo->conexion->affected_rows." filas afectadas.";
            }else{
                //Compruebo que los nombres no se repitan 
                if($this->modelo->conexion->errno==1062){
                    return "El nombre ya existe";
                }else{
                    return "Se ha producido un error inesperado";
                }
            }
        }


        function seleccionarMinijuego(){
            //Incluyo la vista
            include_once __DIR__. "/../views/seleccionar.php";
            //Llamo a la función listar
            $resultado=$this->modelo->listar();
            return $resultado;
        }


        function datosMinijuegoSeleccionado($id){
            $resultado=$this->modelo->consultar($id);
            return $resultado;
        }

        function checkboxMinijuego(){
            //Incluyo la vista
            include_once __DIR__. "/../views/checkbox.php";
            //Llamo a la función listar 
            $resultado=$this->modelo->listar();
            return $resultado;
        }
    }
?>