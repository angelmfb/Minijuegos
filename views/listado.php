<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ángel Manuel Fernández Baños">
        <link rel="stylesheet" href="../css/estilo.css">
        <link rel="icon" href="../imagen/juego.png">
        <title>Minijuegos</title>
    </head>
    <body>
        <header>
            <h1>Listado de Minijuegos</h1>
        </header>
        <nav>
            <ul>
                <li><a href="../index.html">Inicio</a></li>
                <li><a href='index.php?accion=alta'>Alta Minijuegos</a></li>
                <li><a href="index.php?accion=listar">Listado Minijuegos</a></li>
                <li><a href="index.php?accion=seleccionar">Seleccion Minijuegos</a></li>
                <li><a href="index.php?accion=checkbox">Checkbox Minijuegos</a></li>
            </ul>
        </nav>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Icono</th>
                <th>Ruta</th>
            </tr>
            <?php
                require_once __DIR__. "/../controller/controlador.php";
                $controlador=new Controlador();
                $resultado=$controlador->listarMinijuego();
                while($fila=$resultado->fetch_assoc()) {
                    echo "<tr>
                            <td>".$fila['nombre']."</td>
                            <td>".$fila['icono']."</td>
                            <td>".$fila['ruta']."</td>
                            <td><a href='index.php?accion=borrar&id=".$fila['id']."'><img src='../imagen/eliminar.png' /></a></td>
                            <td><a href='index.php?accion=editar&id=".$fila['id']."'><img src='../imagen/editar.png' /></a></td>
                        </tr>";
                }
            ?>
        </table>
    </body>
</html>