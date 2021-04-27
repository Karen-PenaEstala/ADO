<? php
$ G = max ( $ arreglo );
$ P = min ( $ arreglo );
//funciòn que devuelve el valor mas cercano y màs alejado 
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