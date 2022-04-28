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
            <h1>Alta de Minijuegos</h1>
        </header>
        <nav>
            <ul>
                <li><a href="../index.html">Inicio</a></li>
                <li><a href="index.php?action=listar">Listar Minijuegos</a></li>
                <li><a href="">Contacto</a></li>
                <li><a href="">Servicio</a></li>
            </ul>
        </nav>
        <main>
            <h2>Registro</h2>
            <form action="#" method="post">
                <label>Nombre:</label>
                <input type="text" placeholder="Nombre Minijuego" name="nombre"><br /><br />
                <label>Icono:</label>
                <input type="text" placeholder="Icono" name="icono"><br /><br />
                <label>Ruta:</label>
                <input type="text" placeholder="Ruta" name="ruta"><br /><br />
                <input type="submit" value="Enviar" name="enviar">
            </form>
           
        </main>
    </body>
</html>