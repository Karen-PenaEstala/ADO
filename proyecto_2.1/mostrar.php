<? php 

$ nombreAr = "datos.txt" ;

$ archivo = fopen ( $ nombreAr , "r" );
$ arreglo = arreglo ();

// leemos archivo
while (! feof ( $ archivo )) {
    $ arreglo [] = fgets ( $ archivo );
}
// cerramos 
fclose ( $ archivo );

// exploramos la variable
var_dump ( $ arreglo );

// funcion que suma los elementos de un arreglo
$ suma = suma_matriz ( $ arreglo );
echo  "<br>" . $ suma ;

// contabilizador de elementos
$ numElementos = count ( $ arreglo );
echo  "<br>" . $ numElementos ;

//promedio
$ media = $ suma / $ numElementos ;
echo  "<br>" . $ media ;

//devuelve el valor mas grande de un arreglo
$ G = max ( $ arreglo );

//devuelve el valor mas pequeño de un arreglo
$ P = min ( $ arreglo );

//devuelve el valor más alejado segun el problema
function  masAlejado ( $ p , $ g , $ m ) {
    $ n1 = $ g - $ m ;
    $ n2 = $ m - $ p ;
    si ( $ n1 > $ n2 ) {
        return  $ g ;
    }
    else {
        return  $ p ;
    }
}

$ valor_alejado = masAlejado ( $ P , $ G , $ media );
echo  "<br>" . $ valor_alejado ;

//devuelve la posicion 
$ posicion = array_search ( $ valor_alejado , $ arreglo );
echo  "<br>" . $ posicion ;

// cambiamos el valor a -1
$ arreglo [ $ posicion ] = - 1 ;
echo  "<br>" . var_dump ( $ arreglo );

// funcion que devuelve el nuevo promedio segun proyecto
function  nuevoPromedio ( $ arr ) {
    // inicializamos variable
    $ suma = 0 ;

    // recorremos el arreglo 
    foreach ( $ arr  como  $ valor ) {
        if ( $ valor ! = - 1 ) {
            $ suma + = $ valor ;
        }
    }
    // calculamos promedio nuevo sin tomar en cuenta
    // una posicion
    $ prom = $ suma / ( cuenta ( $ arr ) - 1 );
    return  $ prom ;
}
$ promedioN = nuevoPromedio ( $ arreglo );
echo  "<br>" . $ promedioN ;

?>