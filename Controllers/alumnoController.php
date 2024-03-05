<?php
require_once("Models/alumnoModel.php");

$alumno = new AlumnoModel();
if (isset($_POST['ingresar'])) {
    $rut = $_POST['rutIngresado'];
    $nombre = $_POST['nombreIngresado'];
    $apellidoP = $_POST['apellidoPIngresado'];
    $apellidoM = $_POST['apellidoMIngresado'];
    $edad = $_POST['edadIngresado'];
    $carrera = $_POST['carreraIngresado'];
    $alumno->insertarAlumno($rut, $nombre, $apellidoP, $apellidoM, $edad, $carrera);
    echo '<script>alert("Alumno ingresado.");</script>';
}

if (isset($_POST['eliminar'])) {
    $idAlumno = $_POST['idAlumno'];
    $alumno->eliminarAlumno($idAlumno);
    echo '<script>alert("Alumno eliminado.");</script>';
}

if (isset($_POST['actualizar'])) {
    $idAlumno = $_POST['idAlumno'];
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $edad = $_POST['edad'];
    $carrera = $_POST['carrera'];
    $alumno->actualizarAlumno($idAlumno, $rut, $nombre, $apellidoP, $apellidoM, $edad, $carrera);
    echo '<script>alert("Alumno actualizado.");</script>';
}

$alumnos = $alumno->seleccionarAlumnos();

if (isset($_POST['buscar'])) {
    $idBuscado = $_POST['idBuscado'];
    $alumnos = $alumno->buscarAlumno($idBuscado);
}
