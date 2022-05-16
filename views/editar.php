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
            <h1>Editar Minijuegos</h1>
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
                $resultado=$controlador->consultarMinijuego();
                while($fila=$resultado->fetch_assoc()){ ////Duda cuando devuelvo un string me da error porque tengo el fetch como podria arreglarlo
                    $nombre=$fila['nombre'];
                    $icono=$fila['icono'];
                    $ruta=$fila['ruta'];
                    //Como solo va a haber un id lo meto en una variable para después borrarlo si el usuario lo desea    
                    $id=$fila['id'];
                }
                echo "
                        <label>Nombre Minijuego: </label>
                        <input type='text' value=$nombre name='nombre'><br />
                        <label>Nombre Icono: </label>
                    ";
                if($icono==NULL){
                    echo "<input type='file' name='icono'><br />";
                }else{
                    echo "<input type='file' value=$icono name='icono'><br />";
                }
                echo "
                        <label>Ruta Minijuego: </label>
                        <input type='text' value=$ruta name='ruta'><br />
                    "; 
            ?>
            <br />
            <input type="submit" value="Editar" name="editar">
            <input type="submit" value="Cancelar" name="cancelar">
        </form>
    </body>
</html>
<?php
    if(isset($_POST['editar'])){
        //LLamo al método borrarMinijuego del controlador y le paso el id que guardo antes cuando consulto el minijuego
        $resultado=$controlador->editarMinijuego($id);
        //Visualizo el resultado del metodo
        echo $resultado;
        //Redirijo a la página index en 4seg
        header("Refresh:3,url= ../index.html");
    }
    //Si pulsan cancelar redirijo a la página index
    if(isset($_POST['cancelar'])){
        header("Location: ../index.html");
    }
    
?>