<?php
$nombreArchivo = "territory_names.csv";

$archivo = fopen($nombreArchivo,"r") or die("No se puede abrir el archivo: $nombreArchivo";)

$datos = array();

//while(($datos = fgetcsv($archivo,0, ',', '"', '"')) !== False){
   // print_r($datos);
    //print("<br>");
//}

//imprimimos la etiqueta para empezar una tabla
print("<table>");

//recorremos el archivo csv registro por registro
while(($datos = fgetcsv($archivo,0, ',', '"', '"')) !== False){

    //imprimimos el inicio del renglon de tabla tr
    print("<tr>");

    //como el primer registro es una lista
    //recorremos dicha lista campo por campo
    foreach($datos as $campo){

        //imprimimos la etiqueta para el dato de tabla ID
        print("<td>");

        //imprimimos el dato "campo"
        print("$campo");

        //imprimimos el cierre de la tabla
        print("</td>");
    }

    //imprimimos el cieere de renglon de la tabla
    print("</tr>");
}

//imprimimos el cierre de la tabla
print("</table>");