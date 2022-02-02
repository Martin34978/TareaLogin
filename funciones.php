<?php
/*
  Funciones Principales
*/

/*Funcion que recorre un array bidimensional y los muestra en una tabla
Recibe por parámetro un array*/
function mostrarArray($array){
    for ($row = 0; $row < count($array); $row++) {
        echo "<tr>";
        for ($col = 0; $col < 7; $col++) {
          echo "<td>".$array[$row][$col]."</td>";
        }
        echo "</tr>";
      }
}

/*Función para añadir un array al array que se muestra, son una serie de if
que va sumando un contador, si el contador comprueba afirmativamente el 100%
de los if, devuelve un array  con los datos. En el index se le hace un array_push
hacia el array principal del index */
function anadirArray(){
  $dni = $_POST['dni'];
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $nombreCompleto = $nombre .' '.$apellidos;
  $edad = $_POST['edad'];
  $puesto = $_POST['puesto'];
  $subpuesto = $_POST['subpuesto'];
  $antiguedad = $_POST['antiguedad'];
  $salario = $_POST['salario'];
  $check = 0;
  
  if(comprobarDNI($dni)){
    $check++;
  }
  if(comprobarEdad($edad)){
    $check++;
  }
  if(comprobarCadena($nombre)){
    $check++;
  }
  if(comprobarCadena($apellidos)){
    $check++;
  }
  if(comprobarPuesto($puesto)){
    $check++;
  }
  if(comprobarSubPuesto($puesto, $subpuesto)){
    $check++;
  }
  if(comprobarAntiguedad($edad, $antiguedad)){
    $check++;
  }
  if(comprobarSalario($salario)){
    $check++;
  }
  if($check == 8){
    $nuevoEmpleado = array($dni, $nombreCompleto, $edad, $puesto, $subpuesto, $antiguedad, $salario);
    return $nuevoEmpleado;
  }

}

function modificarArray($dniObjetivo, $empleados){
  $dni = $_POST['dni'];
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $nombreCompleto = $nombre .' '.$apellidos;
  $edad = $_POST['edad'];
  $puesto = $_POST['puesto'];
  $subpuesto = $_POST['subpuesto'];
  $antiguedad = $_POST['antiguedad'];
  $salario = $_POST['salario'];
  $check = 0;

  if(comprobarDNI($dni)){
    $check++;
  }
  if(comprobarEdad($edad)){
    $check++;
  }
  if(comprobarCadena($nombre)){
    $check++;
  }
  if(comprobarCadena($apellidos)){
    $check++;
  }
  if(comprobarPuesto($puesto)){
    $check++;
  }
  if(comprobarSubPuesto($puesto, $subpuesto)){
    $check++;
  }
  if(comprobarAntiguedad($edad, $antiguedad)){
    $check++;
  }
  if(comprobarSalario($salario)){
    $check++;
  }

  if($check == 8){
    for ($row = 0; $row < count($empleados); $row++) {
        for ($col = 0; $col < 7; $col++) {
          if($empleados[$row][$col] == $dniObjetivo){
            $nuevoEmpleado = array($dni, $nombreCompleto, $edad, $puesto, $subpuesto, $antiguedad, $salario);
            $empleados[$row] = $nuevoEmpleado;
          }
        }
      }
      return $empleados;
  }else{
    echo "error en los datos";
    // Lo devuelvo también aqui por si hay algún error, que la función pueda mostrar el antiguo array
    return $empelados;
  }
}

function eliminarArray($dniObjetivo,$empleados){
  for ($row = 0; $row < count($empleados); $row++) {
    for ($col = 0; $col < 7; $col++) {
      if($empleados[$row][$col] == $dniObjetivo){
        unset($empleados[$row]);
        return array_values($empleados);
      }
    }
  }
}

/*
  Funciones Auxiliares
*/ 

function dniNoEncontrado(){
  return false;
}

function comprobarDNI($dni){
  $letra = substr($dni, -1);
  $numeros = substr($dni, 0, -1);
  $valido;
  if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
    $valido=true;
    return $valido;
  }else{
    $valido=false;
    return $valido;
  }
}

function comprobarEdad($edad){
  if($edad >= 18 && $edad <= 66 ){
    return true;
  }else{
    return false;
  }
}

function comprobarPuesto($puesto){
  if(strtolower($puesto) == "analista" | strtolower($puesto) == "programador"){
    return true;
  }else{
    return false;
  }
}

function comprobarSubPuesto($puesto, $subpuesto){
  if(strtolower($puesto) == "analista"){
    if(strtolower($subpuesto) == "tecnico" | strtolower($subpuesto) == "funcional"){
      return true;
    }else{
      return false;
    }
  }elseif(strtolower($puesto) == "programador"){
    if(strtolower($subpuesto) == "web" | strtolower($subpuesto) == "multiplataforma"){
      return true;
    }else{
      return false;
    }
  }else{
    return false;
  }
}

function comprobarAntiguedad($edad, $antiguedad){
  if(($edad) > $antiguedad){
    return true;
  }else{
    return false;
  }
}

function comprobarSalario($salario){
  $salarioMinimo = 1100;
  if($salario >= $salarioMinimo){
    return true;
  }else{
    return false;
  }
}

function comprobarCadena($cadena){
  if(strlen($cadena) < 20){
    return true;
  }else{
    return false;
  }
}

/*
  Gestión de erroes
*/
function gestorErrores(){
  $dni = $_POST['dni'];
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $edad = $_POST['edad'];
  $puesto = $_POST['puesto'];
  $subpuesto = $_POST['subpuesto'];
  $antiguedad = $_POST['antiguedad'];
  $salario = $_POST['salario'];
  if(!comprobarDNI($dni)){
    echo '<p style="color:#FF0000";>El DNI no es válido</p>';
  }
  if(!comprobarEdad($edad)){
    echo '<p style="color:#FF0000";>La edad no es válida</p>';
  }
  if(!comprobarPuesto($puesto)){
    echo '<p style="color:#FF0000";>Ese puesto no existe en la empresa</p>';
  }
  if(!comprobarCadena($nombre)){
    echo '<p style="color:#FF0000";>El nombre no es válido</p>';
  }
  if(!comprobarCadena($apellidos)){
    echo '<p style="color:#FF0000";>Los apellidos no son válidos</p>';
  }
  if(!comprobarSubPuesto($puesto, $subpuesto)){
    echo '<p style="color:#FF0000";>Ese subpuesto no existe en la empresa</p>';
  }
  if(!comprobarAntiguedad($edad, $antiguedad)){
    echo '<p style="color:#FF0000";>La angtiguedad no es válida</p>';
  }
  if(!comprobarSalario($salario)){
    echo '<p style="color:#FF0000";>El salario es incorrecto</p>';
  }
}
?>