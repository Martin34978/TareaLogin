<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zona Pública</title>
</head>
<body>
    
<?php
        if(!isset($_COOKIE['arrayEmpleados'])){
            $empleados = array (
                array("34073511T","Maria de las Mercedes", 45, "Programador", "Web", 5, 2000),
                array("47562647G","Eduado Fernandez Solís", 25, "Analista", "Tecnico", 5, 2000),
                array("47345882Z","Isabel Castilla", 31, "Programador", "Multiplataforma", 5, 2000),
                array("47562647G","Carlos Santana", 21, "Programador", "Web", 5, 2000)
            );
            setcookie('arrayEmpleados', json_encode($empleados), time()+3600);
            header("location:publica.php");
        }    
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