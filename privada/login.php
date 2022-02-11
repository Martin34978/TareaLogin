<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['auth'])){
        header("Location:privada.php");
    }
    
    ?>
    <div>
    <fieldset style="max-width: max-content;">
        <legend>Log-In</legend>
        <form action="privada.php" method="POST">
            <label for="username">Nombre:</label>
            <input type="text" name="username">
            <label for="passwd">Contraseña:</label>
            <input type="password" name="passwd">
            <button type="submit">Ingresar</button>
            <br>
            <label><input type="checkbox" name="rUsername" value="rUsername"> Recordar nombre de usuario</label><br>
        </form>
    </fieldset>
    </div>
</body>
</html>