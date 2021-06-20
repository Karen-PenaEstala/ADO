<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROYECTO FINAL</title>
    <link rel="stylesheet" href="./css/chartist.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/estilopropio.css">
    <script src="./js/chartist.min.js"></script>
    
</head>

<body>
    <div clas="container">
        <header class="encabezado">
            <h2>Numero de pantallas que hay en cada vivienda en una determinada ciudad</h1>
        </header>

        <?php
        require_once('./creacion.php');

        //sabemos que el archivo con los datos crudos es 'datosCrudos.txt'
        $archivo = './datosCrudos.txt';


        //creamos el histograma en un arreglo listo para usarse
        $arrHisto = crear_histograma($archivo);

        //se crea el archivo json y nada mas 
        $miJson = crear_json('./json/histograma.json', $arrHisto);

        //preparamos dos arreglos para separar las etiquetas de los valores
        //en dos listas diferentes 
        $lista_labels = array();
        $lista_valores = array();

        //recorremos para sacar los datos por separado (por conveniencia)
        //tambien sabemos que solo son  6 datos 
        foreach ($arrHisto as $nombre=> $valor) {
            $lista_labels[] = $nombre;
            $lista_valores[] = $valor;
        }
        ?>
        
        <div class="container">
            <div class="table-responsive">
                <table class="table table-hover marco_histo">
                    <thead class="thead-dark">
                        <tr>
                            <th>Familias con 0 pantallas</th>
                            <th>Familias con 1 pantalla</th>
                            <th>Familias con 2 pantallas</th>
                            <th>Familias con 3 pantallas</th>
                            <th>Familias con 4 pantallas</th>
                            <th>Familias con 5 pantallas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $lista_valores[0]; ?></td>
                            <td><?php echo $lista_valores[1]; ?></td>
                            <td><?php echo $lista_valores[2]; ?></td>
                            <td><?php echo $lista_valores[3]; ?></td>
                            <td><?php echo $lista_valores[4]; ?></td>
                            <td><?php echo $lista_valores[5]; ?></td>
                        </tr>
                    </tbody>
                    <caption class="marco_histo">HISTOGRAMA - El estudio realizado abarca a 25000 hogares</caption>
                </table>
            </div>
        </div>
       
        <div class="encabezado">
            <h3>GRÁFICA DE BARRAS</h3>
        </div>

        <div class="ct-charts ct-octave"></div>

        <div class="encabezado">
            <h3>GRÁFICA DE PASTEL</h3>
        </div>
        <div class="ct-charts1 ct-octave"></div>

        <div class="encabezado">
            <h3>GRÁFICA DE LINEAL</h3>
        </div>
        <div class="ct-charts2 ct-octave"></div>

        <div class="graficas">
            <script>
                // Configuracion de datos
                var datos = {
                    labels: [
                        '<?php echo $lista_labels[0]; ?> pantallas',
                        '<?php echo $lista_labels[1]; ?> pantalla',
                        '<?php echo $lista_labels[2]; ?> pantallas',
                        '<?php echo $lista_labels[3]; ?> pantallas',
                        '<?php echo $lista_labels[4]; ?> pantallas',
                        '<?php echo $lista_labels[5]; ?> pantallas',

                    ],
                    series: [

                        <?php echo $lista_valores[0]; ?>,
                        <?php echo $lista_valores[1]; ?>,
                        <?php echo $lista_valores[2]; ?>,
                        <?php echo $lista_valores[3]; ?>,
                        <?php echo $lista_valores[4]; ?>,
                        <?php echo $lista_valores[5]; ?>,
                    ]
                };
                // Configuracion de opciones
                var opciones = {
                    width: 700,
                    height: 500,
                    distributeSeries: true,
                    //showArea: true,
                    seriesBarDistance: 20,
                    showLine: false,
                    showPoint: false,
                    chartPadding: {
                        right: 35,
                        left: 10,
                        bottom: 20
                    },
                    axisX: {
                        // En el eje x, 'start' significa arriba y 'end' significa abajo
                        position: 'end',
                    },
                    axisY: {
                        type: Chartist.FixedScaleAxis,
                        ticks: [0, 2000, 4000, 6000, 8000, 11000, 13000],
                        //low: 20,
                        high: 15000
                    }

                };
                var opcionesResponsive = [
                    ['screen and (min-width: 641px) and (max-width: 1024px)', {
                        //seriesBarDistance:10,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value;
                            }
                        }

                    }],
                    ['screen and (max-width: 640px)', {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value[0];
                            }
                        }
                    }]
                ];

                new Chartist.Bar('.ct-charts', datos, opciones, opcionesResponsive);
                new Chartist.Line('.ct-charts2', {
                    labels: [
                        '<?php echo $lista_labels[0]; ?> pantallas',
                        '<?php echo $lista_labels[1]; ?> pantalla',
                        '<?php echo $lista_labels[2]; ?> pantallas',
                        '<?php echo $lista_labels[3]; ?> pantallas',
                        '<?php echo $lista_labels[4]; ?> pantallas',
                        '<?php echo $lista_labels[5]; ?> pantallas',
                    ],
                    series: [
                        [
                            <?php echo $lista_valores[0]; ?>,
                            <?php echo $lista_valores[1]; ?>,
                            <?php echo $lista_valores[2]; ?>,
                            <?php echo $lista_valores[3]; ?>,
                            <?php echo $lista_valores[4]; ?>,
                            <?php echo $lista_valores[5]; ?>
                        ]
                    ]
                }, {

                    showArea: true,
                    width: 700,
                    height: 500
                });
                
                 new Chartist.Pie('.ct-charts1', {
                    series: [
                        
                            <?php echo $lista_valores[0]; ?>,
                            <?php echo $lista_valores[1]; ?>,
                            <?php echo $lista_valores[2]; ?>,
                            <?php echo $lista_valores[3]; ?>,
                            <?php echo $lista_valores[4]; ?>,
                            <?php echo $lista_valores[5]; ?>
                        
                    ]
                }, {
                    width: 400,
                    height: 400,
                    chartPadding: 30,
                    labelOffset: 50,
                    labelDirection: 'explode'
                });
            </script>
            <footer>
                <p> Debido a los resultados que arrojó la tabla de frecuencias, y de en base a los cuales se realizaron los gráficos
                    se puede afirmar que en la cuidad en la que realizó el estudio, el 44.06%
                    de los encuestado afirman que cuentan con 3 pantallas, el 43.90% cuentan con 2 pantallas
                    dentro de su hogar, mientras que el 0.3% no cuentan con ninguna pantalla.

                    Teniendo como base esta información se puede concluir que la pobalción prefiere tener entre 2 y 3 pantallas
                    , pocos son los que tienen 4 o 5 pantallas dentro de sus viviendas.

                
            </p>
            </footer>
                
            </script>
        </div>
    </div>

</body>

</html>