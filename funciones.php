<?php
/*Funcion que recorre un array bidimensional y los muestra en una tabla
Recibe por parámetro un array*/
function mostrarArray($array){
    for ($row = 0; $row < 4; $row++) {
        echo "<tr>";
        for ($col = 0; $col < 7; $col++) {
          echo "<td>".$array[$row][$col]."</td>";
        }
        echo "</tr>";
      }
}
?>