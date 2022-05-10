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
            <h1>Checkbox Minijuegos</h1>
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
        <form action="#" method="post">
            <?php
                require_once __DIR__. "/../controller/controlador.php";
                $controlador=new Controlador();
                $resultado=$controlador->checkboxMinijuego();
                while($fila=$resultado->fetch_assoc()){
                    echo "
                            <label>".$fila['nombre']."</label>
                            <input type='checkbox' name='lista[]' value=".$fila['nombre']." ><br>
                        ";
                }
            ?>
            <input type="submit" value="Enviar" name="enviar">
            <input type="submit" value="Cancelar" name="cancelar">
        </form>
        <?php
            if(isset($_POST['enviar'])){
                //comprueba los marcados
                if(!empty($_POST['lista'])){
                    foreach($_POST['lista'] as $seleccionado){
                    echo $seleccionado."</br>";// Imprime resultados
                    }
                }
            }//No he sido capaz de enviarlo con el id y realizar la consulta porque me decia un fallo que no encontraba el id
        ?>
    </body>
</html>