<? php
///constante
define ( "n_max" , 13 );

función  generar ( $ min , $ max ) {
    $ valor = mt_rand ( $ mínimo , $ máximo ) / 10 ;
    return  $ valor ;
}
// archivo con valores
$ archivo = fopen ( "datos.txt" , "w" );

/// 13 valores en un archivo de texto
para ( $ i = 0 ; $ i < n_max ; $ i ++) {
    $ dato = generar ( 30 , 90 );
    si ( $ i == n_max - 1 ) {
        fwrite ( $ archivo , $ dato );  
    }
    else {
        fwrite ( $ archivo , $ dato . "\ n" );
    }
        
}
echo  "Archivo escrito" ;

?>