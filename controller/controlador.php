<?php

    class Controlador{
        public $modelo;
        function __construct(){
            require_once __DIR__ . '/../model/modelo.php';
            $this->modelo = new Modelo();
        }
        //Para hacer las comprobaciones en el alta y realizarla
        function altaMinijuego(){
            include_once __DIR__ . '/../views/alta.php';
            //Compruebo que el nombre no se queda en blanco
            if(empty($_POST['nombre'])){    
                echo ('No se puede quedar el nombre en blanco'); 
            }else{
                //Compruebo si la ruta se queda en blanco
                if(empty($_POST['ruta'])){   
                    echo ('La ruta no se puede quedar en blanco');
                }else{
                        $this->modelo->alta();
                }
            }
        }
    }
?>