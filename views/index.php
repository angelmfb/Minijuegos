<?php
    require_once __DIR__ . '/../controller/controlador.php';
    $controlador = new Controlador();
    switch ($_GET['action']) {
        case 'alta':
            $controlador->altaMinijuego();
            break;
    }
?>