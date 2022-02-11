<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Zona Pública</title>
</head>
<body>
    
<?php
   
    ?>
    <table border='1'>
        <tbody>
        <tr>
            <th>DNI</th>
            <th>Nombre Completo</th>
            <th>Edad</th>
            <th>Puesto</th>
            <th>Sub-Puesto</th>
            <th>Antigüedad</th>
            <th>Salario</th>
        </tr>
        <?php
            include '../funciones.php';
            $empleados = json_decode($_COOKIE['arrayEmpleados'], true);
            mostrarArray($empleados);
        ?>
    </table>
    <div>
        <a href="../index.html"><h3 class="noDecoration"> Volder al Índice</h3></a>
    </div>
</body>
</html>