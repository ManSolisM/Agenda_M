-- Active: 1756918224915@@127.0.0.1@3306@agenda
DROP DATABASE agenda2;
CREATE DATABASE agenda2;
USE agenda2;

create table t_contactos(
    id int auto_increment primary key,
    paterno varchar(50),
    materno varchar(50),
    nombre varchar(50),
    telefono varchar(50),
    correo varchar(50),
    descripcion text
);

CREATE TABLE t_fotos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_contacto INT,
    nombre VARCHAR(50),
    ruta VARCHAR(50),
    FOREIGN KEY (id_contacto)
        REFERENCES t_contactos (id)
);