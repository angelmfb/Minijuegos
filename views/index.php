<?php
    require_once __DIR__ . '/../controller/controlador.php';
    $controlador = new Controlador();
    if(isset($_GET['accion'])){
        //Realizo un switch de la accion y según la acción que viene por ruta llamo a un método del controlador u otro
        switch($_GET['accion']){
            case 'alta':
                $controlador->alta();
                break;
            case 'listar':
                $controlador->listarMinijuego();
                break;
            case 'borrar':
                $controlador->consultarMinijuego();
                break;
            case 'editar':
                $controlador->consultarMinijuego();
                break;
            case 'seleccionar':
                $controlador->seleccionarMinijuego();
                break;
            case 'checkbox':
                $controlador->checkboxMinijuego();
                break;
            default:
                echo "Se ha producido un error inesperado";
                break;
        }
    }else{
        echo "No hay ninguna acción seleccionada";
    }
?>