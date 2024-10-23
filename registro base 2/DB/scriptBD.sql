-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS user_db;

-- Usar la base de datos recién creada
USE user_db;

-- Crear la tabla 'user_form'
CREATE TABLE IF NOT EXISTS user_form (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    imagen VARCHAR(255),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);
