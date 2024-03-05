<?php

class AlumnoModel
{
    private $db;
    public function __construct()
    {
        require_once("Models/conexion.php");
        $this->db = Conectarse();
    }

    function seleccionarAlumnos()
    {
        $query = "SELECT * FROM Alumnos;";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $result;
        } else {
            echo "Error: " . mysqli_error($this->db);
            return false;
        }
    }

    function buscarAlumno($idBuscado)
    {
        $query = "SELECT * FROM Alumnos WHERE idAlumno = $idBuscado;";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $result;
        } else {
            echo "Error: " . mysqli_error($this->db);
            return false;
        }
    }
    function eliminarAlumno($idAlumno)
    {
        $query = "DELETE FROM Alumnos WHERE idAlumno = $idAlumno";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->db);
            return false;
        }
    }
    function insertarAlumno($rut, $nombre, $apellidoP, $apellidoM, $edad, $carrera)
    {
        $query = "INSERT INTO Alumnos (rut, nombre, apellidoP, apellidoM, edad, carrera) 
                  VALUES ('$rut', '$nombre', '$apellidoP', '$apellidoM', $edad, '$carrera')";

        $result = mysqli_query($this->db, $query);

        if ($result) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->db);
            return false;
        }
    }

    function actualizarAlumno($idAlumno, $rut, $nombre, $apellidoP, $apellidoM, $edad, $carrera)
    {
        $query = "UPDATE Alumnos SET rut = '$rut', nombre = '$nombre', apellidoP = '$apellidoP', apellidoM = '$apellidoM',
                      edad = '$edad', carrera = '$carrera' WHERE idAlumno = $idAlumno;";
        $result = mysqli_query($this->db, $query);

        if ($result) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->db);
            return false;
        }
    }
}
