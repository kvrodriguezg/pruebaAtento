<?php
require_once("Models/alumnoModel.php");
$alumno = new AlumnoModel();
$alumnos = $alumno->seleccionarAlumnos();
