<?php require_once("Controllers/dataTableController.php"); ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="m-3 p-3">
        <h1>Aplicación DataTable:</h1>
        <table class="table table-striped text-center" id="tablaAlumnos">
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
                        <td><?php echo $row['idAlumno'] ?></td>
                        <td><?php echo $row['rut'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['apellidoP'] ?></td>
                        <td><?php echo $row['apellidoM'] ?></td>
                        <td><?php echo $row['edad'] ?></td>
                        <td><?php echo $row['carrera'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <form method="post" action="index.php">
            <input type="submit" class="btn btn-primary" value="Volver">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var tablaAlumnos = $('#tablaAlumnos').DataTable();

            function actualizarTabla() {
                location.reload();
            }
            setInterval(actualizarTabla, 4000);
        });
    </script>
</body>