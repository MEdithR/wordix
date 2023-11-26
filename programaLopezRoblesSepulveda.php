<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/*Lopez, Lucas. legajo: FAI-3327. mail: lopezlucasnqn@gmail.com . github lucasarg2023 
 *Robles, Marta Edith. legajo: FAI-4978. mail: m.edith.robles@gmail.com . github: MEdithR 
 *Sepulveda, Mario. legajo FAI-1956. mail: mario.sepulveda@est.fi.uncoma.edu.ar . github: Nightmare716 */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PERRO", "MANGO", "CINCO", "CIRCO", "MAGIA"
        
    ];

    return ($coleccionPalabras);
}


/** inicializa una estructura de datos con partidas de jugadores
 *@return array
 */
function cargarPartidas(){
    //@param array $coleccionPartidas//
    $coleccionPartidas[0]=["palabraWordix"=>"MUJER","jugador"=>"blopa","intentos"=>4,"puntaje"=>12];
    $coleccionPartidas[1]=["palabraWordix"=>"YUYOS","jugador"=>"demian","intentos"=>1,"puntaje"=>17];
    $coleccionPartidas[2]=["palabraWordix"=>"PIANO","jugador"=>"pauu","intentos"=>3,"puntaje"=>13];
    $coleccionPartidas[3]=["palabraWordix"=>"HUEVO","jugador"=>"Blopa","intentos"=>3,"puntaje"=>12];
    $coleccionPartidas[4]=["palabraWordix"=>"MANGO","jugador"=>"tsuki","intentos"=>2,"puntaje"=>14];
    $coleccionPartidas[5]=["palabraWordix"=>"PIANO","jugador"=>"tsuki","intentos"=>4,"puntaje"=>12];
    $coleccionPartidas[6]=["palabraWordix"=>"GOTAS","jugador"=>"cinn","intentos"=>6,"puntaje"=>11];
    $coleccionPartidas[7]=["palabraWordix"=>"FUEGO","jugador"=>"Blopa","intentos"=>6,"puntaje"=>0];
    $coleccionPartidas[8]=["palabraWordix"=>"MUJER","jugador"=>"mathi","intentos"=>2,"puntaje"=>11];
    $coleccionPartidas[9]=["palabraWordix"=>"TINTO","jugador"=>"mathi","intentos"=>5,"puntaje"=>13];
    
    return $coleccionPalabras;

}

/**Mustra un menu de opciones
 * @return int
 */
function seleccionarOpcion (){
    //@param int $opcionVal//

    echo "Menu de opciones: \n
    1) Jugar wordix con una palabra elegida \n
    2) Jugat wordix con una palabra aleatoria \n
    3) Mostrar una partida \n
    4) Mostar la primer partida ganadora \n
    5) Mostar resumen de Jugador \n
    6) Mostarar listado de partidas ordenadas por jugador y por palabra \n
    7) Agregar una palabra de 5 letras a wordix \n
    8) Salir \n";

    $opcionVal = solicitarNumeroEntre(1, 8);


    return $opcionVal;

}



/* ****COMPLETAR***** */ 



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/
