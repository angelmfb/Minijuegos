/**
*Ángel Manuel Fernández Baños
*/
--Crear BD
CREATE DATABASE Minijuegos;

-- tabla Minijuegos 
CREATE TABLE Minijuego (
    id tinyint unsigned not null primary key AUTO_INCREMENT,
    nombre varchar(50) not null UNIQUE,
    icono varchar(100) null,
    ruta varchar(255) not null
);

--Permisos
GRANT SELECT, INSERT, UPDATE, DELETE ON 'minijuegos'.* TO 'angel'@'%';
