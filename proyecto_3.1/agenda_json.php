<?php
//requerimos llamar al archivo que iene la clase
// contactos para poder usarla
require_once('./ClassVuelo.php');
//definimos el nombre del archivo para el JSON
$archivo_json = "agenda.json";
//para simular que los contactos vienen de algun lado
// creamos dos objetos de la clase 'Contacto', contacto1 y contacto2
// esta vez no los capturamos desde formulario
$vuelo1 = new Vuelo(
    "1",
    "New York",
    "London",
    "415",
);
// inventamos otro contacto
$vuelo2 = new Vuelo(
    "2",
    "Shangai",
    "Paris",
    "760",
);
$vuelo3 = new Vuelo(
    "3",
    "Istanbui",
    "Tokyo",
    "700",
);
$vuelo4 = new Vuelo(
    "4",
    "New York",
    "Paris",
    "435",
);
$vuelo5 = new Vuelo(
    "5",
    "Moscow",
    "Paris",
    "245",
);
$vuelo6 = new Vuelo(
    "6",
    "Lima",
    "New York",
    "455",
);
//preparamos un arreglo para los contactos
$vuelos = array();
//agregamos el primer contacto
$vuelos[] = $vuelo1;
//agregamos el segundo contacto
$vuelos[] = $vuelo2;
$vuelos[] = $vuelo3;
$vuelos[] = $vuelo4;
$vuelos[] = $vuelo5;
$vuelos[] = $vuelo6;
// en ejercicios anteriores los creabamos a partir de simples strings
// Ahora creamos el json a partir de los objetos (es más limpio el código)
$json_string = json_encode($vuelos);
// Pasamos el string en formato json a un archivo
// es decir escribiremos en un archivo común
// como en la primera unidad
// creamos un archivo en modo 'w'
$arch = fopen($archivo_json,'w');
if( $arch == false ) {
    echo ( "Error al abrir el archivo" );
    exit();
}

//escribimos en el archivo el string que contiene el json
fwrite($arch,$json_string);
//cerramos el archivo como se debe
fclose($arch);
//mostramos mensaje de que se escribieron los datos
echo '<h3>Datos escritos en agenda.json </h3>';
//redirigimos para mostrar resultados desde el archivo creado
header("refresh:2;url=mostrar_json.php");
    