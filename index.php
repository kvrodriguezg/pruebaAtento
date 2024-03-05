<?php require_once("Controllers/alumnoController.php"); ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<h1 class="text-center">Prueba Atento</h1>
<form class="form-inline" method="post" action="index.php">
    <div class="form-control">
        <h2>Ingresar alumno:</h2>
        <input required type="text" name="rutIngresado" placeholder="Rut">
        <input required type="text" name="nombreIngresado" placeholder="Nombre">
        <input required type="text" name="apellidoPIngresado" placeholder="Apellido Paterno">
        <input required type="text" name="apellidoMIngresado" placeholder="Apellido Materno">
        <input required type="number" name="edadIngresado" placeholder="Edad">
        <input required type="text" name="carreraIngresado" placeholder="Carrera">
        <input type="hidden" name="ingresar" value="ingresar">
        <input type="submit" class="btn btn-primary" value="Ingresar">
    </div>
</form>
<br>
<form class="form-inline" method="post" action="index.php">
    <div class="form-control">
        <h2>Buscar alumno:</h2>
        <input required type="number" name="idBuscado" placeholder="Id">
        <input type="hidden" name="buscar" value="buscar">
        <input type="submit" class="btn btn-primary" value="Buscar">
    </div>
</form>
<table class="table table-striped text-center">
    <thead>
        <tr>
            <th>ID Alumno</th>
            <th>Rut</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Edad</th>
            <th>Carrera</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($alumnos)) { ?>
            <tr class="table table-striped">
                <form method="post" action="index.php">
                    <input type="hidden" name="idAlumno" value=<?php echo $row['idAlumno'] ?>>
                    <td><?php echo $row['idAlumno'] ?></td>
                    <td><input required type="text" name="rut" value=<?php echo $row['rut'] ?>></td>
                    <td><input required type="text" name="nombre" value=<?php echo $row['nombre'] ?>></td>
                    <td><input required type="text" name="apellidoP" value=<?php echo $row['apellidoP'] ?>></td>
                    <td><input required type="text" name="apellidoM" value=<?php echo $row['apellidoM'] ?>></td>
                    <td><input required type="number" name="edad" value=<?php echo $row['edad'] ?>></td>
                    <td><input required type="text" name="carrera" value=<?php echo $row['carrera'] ?>></td>
                    <td>
                        <input name="actualizar" type="submit" value="Actualizar" class="btn btn-success"></input>
                    </td>
                    <td>
                        <input name="eliminar" type="submit" value="Eliminar" class="btn btn-danger"></input>
                    </td>
                </form>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>