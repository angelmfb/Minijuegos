<?php

    require_once __DIR__ . '/../model/modelo.php';

    class Controlador extends Modelo{
        function __construct(){
            parent:: __construct();
        }
        function altaMinijuego(){
            if($_POST['nombre']==''){    //Compruebo que el nombre no se queda en blanco
                echo ('No se puede quedar el nombre del usuario en blanco'); 
            }else{
                if($_POST['ruta']==''){   //Compruebo si la ruta se queda en blanco
                    echo ('La ruta no se puede quedar en blanco');
                }else{
                        $this->alta();
                }
            }
        }
    }
?>