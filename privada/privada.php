<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Página Privada</title>
</head>
<body>
    <?php
    //Inicio de sesión, incorporamos las funciones y mapeamos el username y password introducidos
    session_start();
    include '../funciones.php';
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];
    
    //Control de acceso, no deja pasar si no es positiva la búsqueda o si no tiene auth en $_SESSION
    if(!consultaSQL($username, $passwd) && !isset($_SESSION['auth'])){
        header("Location:../index.html");
    }
    //Comprobamos si tiene la opción recordar usuario
    if(isset($_POST['rUsername'])){
        $_SESSION['auth'] = 1;
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

        /*Desactivamos el reporte de errores para que no muestre los warnings
        que saltan cuando hay algún dato erroneo y hace el array_push con un array vacio*/
        //error_reporting(0);

        //Si no existe el array de los empleados lo creamos
        if(!isset($_COOKIE['arrayEmpleados'])){
            $empleados = array (
                array("34073511T","Maria de las Mercedes", 45, "Programador", "Web", 5, 2000),
                array("47562647G","Eduado Fernandez Solís", 25, "Analista", "Tecnico", 5, 2000),
                array("47345882Z","Isabel Castilla", 31, "Programador", "Multiplataforma", 5, 2000),
                array("47562647G","Carlos Santana", 21, "Programador", "Web", 5, 2000)
            );
            setcookie('arrayEmpleados', json_encode($empleados), time()+(60 * 60 * 24),'/');
            header("location:privada.php");
            
        }

        //Si existía o lo hemos creado, lo guardamos en una variable
        $empleados = json_decode($_COOKIE['arrayEmpleados'], true);
        mostrarArray($empleados);
        ?>
        </tbody>
    </table>
    <h3><strong>Gestión de Empleados</strong></h3>
    
    <form method="POST" action= <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
    <table border="1">
        <tr>
            <td><input type="submit" method="POST" name="anadir" value="Añadir"></td>
            <td><input type="submit" method="POST" name="modificar" value="Modificar"></td>
            <td><input type="submit" method="POST" name="borrar" value="Borrar"></td>
        </tr>
    </table>
    <div>
            <label>DNI: <input type="text" name="dni" maxlength="9" pattern="[0-9]{8}[A-Za-z]{1}" title="Debe poner 8 números y una letra" required/></label><br>
            <label>Nombre: <input type="text" name="nombre"  /></label><br>
            <label>Apellidos: <input type="text" name="apellidos"  /></label><br>
            <label>Edad: <input type="num" name="edad" maxlength="2" pattern="[0-9]{1-2}" /></label><br>
            <label>Puesto: <input type="text" name="puesto" /></label><br>
            <label>Subuesto: <input type="text" name="subpuesto" /></label><br>
            <label>Antigüedad: <input type="text" name="antiguedad" maxlength="2" pattern="[0-9]{1-2}" /></label><br>
            <label>Salario: <input type="text" name="salario" maxlength="8" pattern="[0-9]{4-8}" /></label>
        </form>
    </div>
    <div>
        <p>===========================MENSAJES====================================</p>
        
        <?php 
        if(isset($_POST["anadir"])){
            gestorErrores();
            
        }
        if(isset($_POST["modificar"])){
            gestorErrores();
        }

    
        ?>
    </div>
    <div>
        <a href="../index.html">Volver al Inicio</a>
    </div>
</body>
</html>