<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Prueba Práctica</title>
</head>
<body>
    <table border='1'>
        <tbody>
        <tr>
            <td>DNI</td>
            <td>Nombre Completo</td>
            <td>Edad</td>
            <td>Puesto</td>
            <td>Sub-Puesto</td>
            <td>Antigüedad</td>
            <td>Salario</td>
        </tr>
        <?php
        $empleados = array (
            array("dnifalso1","Maria de las Mercedes", "25", "Programadora", "PHP", 5, 2000),
            array("dnifalso2","Eduado Fernandez Solís", 25, "Programadora", "PHP", 5, 2000),
            array("dnifalso3","Isabel Castilla", 25, "Programadora", "PHP", 5, 2000),
            array("dnifalso4","Carlos Santana", 25, "Programadora", "PHP", 5, 2000)
        );

        for ($row = 0; $row < 4; $row++) {
            echo "<tr>";
            for ($col = 0; $col < 7; $col++) {
              echo "<td>".$empleados[$row][$col]."</td>";
            }
            echo "</tr>";
          }
        ?>
        </tbody>
    </table>
    <h3><strong>Gestión de Empleados</strong></h3>
    <table border="1">
        <tr>
            <td><a href="index.php">Añadir</a></td>
            <td>Modificar</td>
            <td>Borrar</td>
        </tr>
    </table>
    <div>
        <form method="POST" action= <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
            <label>DNI: <input type="text" name="dni" /></label><br>
            <label>Nombre: <input type="text" name="nombre" /></label><br>
            <label>Apellidos: <input type="text" name="apellidos" /></label><br>
            <label>Edad: <input type="text" name="edad" /></label><br>
            <label>Puesto: <input type="text" name="puesto" /></label><br>
            <label>Antigüedad: <input type="text" name="antiguedad" /></label><br>
            <label>Salario: <input type="text" name="salario" /></label>
        </form>
    </div>
    <div>
        <p>===========================MENSAJES====================================</p>
        
    </div>
</body>
</html>
