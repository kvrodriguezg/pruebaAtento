CREATE DATABASE IF NOT EXISTS bddprueba;
USE bddprueba;

CREATE TABLE IF NOT EXISTS Alumnos (
    idAlumno INT AUTO_INCREMENT PRIMARY KEY,
    rut VARCHAR(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellidoP VARCHAR(100) NOT NULL,
    apellidoM VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    carrera VARCHAR(100) NOT NULL
);

SELECT * FROM Alumnos;