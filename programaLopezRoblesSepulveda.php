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
function cargarPartidas()
{
    //@param array $coleccionPartidas//
    $coleccion = [];
$pa1 = ["palabraWordix" => "SUECO", "jugador" => "kleiton", "intentos" => 0, "puntaje" => 0];
$pa2 = ["palabraWordix" => "YUYOS", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];
$pa3 = ["palabraWordix" => "HUEVO", "jugador" => "zrack", "intentos" => 3, "puntaje" => 9];
$pa4 = ["palabraWordix" => "TINTO", "jugador" => "cabrito", "intentos" => 4, "puntaje" => 8];
$pa5 = ["palabraWordix" => "RASGO", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];
$pa6 = ["palabraWordix" => "VERDE", "jugador" => "cabrito", "intentos" => 5, "puntaje" => 7];
$pa7 = ["palabraWordix" => "CASAS", "jugador" => "kleiton", "intentos" => 5, "puntaje" => 7];
$pa8 = ["palabraWordix" => "GOTAS", "jugador" => "kleiton", "intentos" => 0, "puntaje" => 0];
$pa9 = ["palabraWordix" => "ZORRO", "jugador" => "zrack", "intentos" => 4, "puntaje" => 8];
$pa10 = ["palabraWordix" => "GOTAS", "jugador" => "cabrito", "intentos" => 0, "puntaje" => 0];
$pa11 = ["palabraWordix" => "FUEGO", "jugador" => "cabrito", "intentos" => 2, "puntaje" => 10];
$pa12 = ["palabraWordix" => "TINTO", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];


array_push($coleccion, $pa1, $pa2, $pa3, $pa4, $pa5, $pa6, $pa7, $pa8, $pa9, $pa10, $pa11, $pa12);
return $coleccion;
}


/**Mustra un menu de opciones
 * @return int
 */
function seleccionarOpcion (){
    //@param int $opcionVal//

    echo "Menu de opciones: \n
    1) Jugar wordix con una palabra elegida \n
    2) Jugar wordix con una palabra aleatoria \n
    3) Mostrar una partida \n
    4) Mostar la primer partida ganadora \n
    5) Mostar resumen de Jugador \n
    6) Mostarar listado de partidas ordenadas por jugador y por palabra \n
    7) Agregar una palabra de 5 letras a wordix \n
    8) Salir \n";

    $opcionVal = solicitarNumeroEntre(1, 8);
    return $opcionVal;

}

function verifMismaPalabra($coleccionPart, $palabra, $jugador) {
    foreach ($coleccionPart as $item) {
        if ($item["palabraWordix"] === $palabra && $item["jugador"] === $jugador) {
            return true; // La combinación ya existe
        }
    }
    return false; // La combinación no existe
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

// Declaración de variables:
$coleccionPartidas = cargarPartidas(); 
$coleccionPalabras = cargarColeccionPalabras();
// Proceso:
do {
    $opcion = seleccionarOpcion();

    switch ($opcion) {
        case 1:
            // Jugar Wordix con una palabra elegida
            do {
                echo "Ingrese el numero de palabra Wordix a adivinar: ";
                $inp=trim(fgets(STDIN));

                while (!is_numeric($inp) || $inp <= 0 || $inp > count($coleccionPalabras)) {
                    echo "Error: ingreso un numero fuera del rango o ingreso una palabra, pruebe otra vez: ";
                    $inp = trim(fgets(STDIN));
                }

                $palabraWordix = $coleccionPalabras[$inp - 1];
                echo "Ingrese su nombre de usuario: ";
                $nombreUsuario = trim(fgets(STDIN));
               
                    $resultadoVerificado = verifMismaPalabra($coleccionPartidas, $palabraWordix, $nombreUsuario);
               
                    if ($resultadoVerificado) {
                        echo "Error: Esta palabra ya fue usada por el mismo usuario. Elige otra palabra o jugador.\n";
                        // Realizar acciones adicionales si es necesario, como cambiar $palabra o $jugador
                    }
               
            } while ($resultadoVerificado);

            // cargo los datos de la part. luego de verificar que el usuario eligio otra palabra
            $partida = jugarWordix($palabraWordix, $nombreUsuario);


            // Agregar la partida a la colección
            array_push($coleccionPartidas, $partida);
            break;

        case 2:
            do{
            // Jugar Wordix con una palabra aleatoria
            echo "Ingrese su nombre de usuario: ";
            $nombreUsuario = trim(fgets(STDIN));
            $palabraAleatoria = $coleccionPalabras[array_rand($coleccionPalabras)];
           
           
            $resultadoVerificado = verifMismaPalabra($coleccionPartidas, $palabraAleatoria, $nombreUsuario);
               
                    if ($resultadoVerificado) {
                        echo "Error: esta palabra random que salio al azar ya a sido usada por el mismo usuario pruebe otra vez " ;
                        // Realizar acciones adicionales si es necesario, como cambiar $palabra o $jugador
                    }
               
            } while ($resultadoVerificado);

            $partida = jugarWordix($palabraAleatoria, $nombreUsuario);
            // Agregar la partida a la colección
            array_push($coleccionPartidas, $partida);
            break;

        case 3:
            // Mostrar una partida
            if (empty($coleccionPartidas)) {
                echo "No existe ninguna partida guardada." ;
            } else {
                echo "Ingrese el índice de la partida a mostrar: ";
                $indicePartida = solicitarNumeroEntre(1, count($coleccionPartidas)) - 1;
        
                // Se verifica si el índice de partida es válido
                if (isset($coleccionPartidas[$indicePartida])) {
                    $partida = $coleccionPartidas[$indicePartida];
                    imprimirResultadoDos($partida, $indicePartida);
                } else {
                    echo "Índice de partida no válido.\n";
                }
            }
            break;
        case 4:
            // Mostrar la primera partida de un jugador específico
            echo "Ingrese el nombre del jugador: ";
                $nombreJugador = trim(fgets(STDIN)); // Lee la entrada del usuario
            
                $partidaJugador = null;
                $indicePartida = null; // Define $indicePartida aquí
            
                foreach ($coleccionPartidas as $indice => $partida) {
                    if ($partida["jugador"] === $nombreJugador) {
                        $partidaJugador = $partida;
                        $indicePartida = $indice;
                        break;
                    }
                }
            
                if ($partidaJugador !== null) {
                    imprimirResultadoDos($partidaJugador, $indicePartida);
                } else {
                    echo "El jugador $nombreJugador no tiene ninguna partida registrada.\n";
                }
                break;
            
            case 5:
                echo "Ingrese el nombre de usuario: ";
                $nombreUsuario = trim(fgets(STDIN));
                $resumenJugador = obtenerResumenJugador($nombreUsuario, $coleccionPartidas);
            
                $partidas = 0;
                $victorias = 0;
                $intentoUno = 0;
                $intentoDos = 0;
                $intentoTres = 0;
                $intentoCuatro = 0;
                $intentoCinco = 0;
                $intentoSeis = 0;
                $puntajeTotal = 0;
            
                if ($resumenJugador) {
                    echo "Resumen de $nombreUsuario:\n";
                    echo "Partidas: " . count($resumenJugador) . "\n";
            
                    foreach ($resumenJugador as $resumen) {
                        echo "Palabra: {$resumen['palabraWordix']}, Intentos: {$resumen['intentos']}, Puntaje: {$resumen['puntaje']}\n";
            
                        if ($resumen['intentos'] > 0) {
                            $victorias++;
                        }
            
                        switch ($resumen['intentos']) {
                            case 1:
                                $intentoUno++;
                                break;
                            case 2:
                                $intentoDos++;
                                break;
                            case 3:
                                $intentoTres++;
                                break;
                            case 4:
                                $intentoCuatro++;
                                break;
                            case 5:
                                $intentoCinco++;
                                break;
                            case 6:
                                $intentoSeis++;
                                break;
                        }
                        $partidas++;
                        $puntajeTotal += $resumen['puntaje'];
                    }
                    $porcentajeVic = 100 / $partidas * $victorias;
                    echo "***************************\n";
                    echo "jugador " . $nombreUsuario . "\n";
                    echo "partidas: " . $partidas . "\n";
                    echo "Puntaje Total: " . $puntajeTotal . "\n";
                    echo "Victorias: " . $victorias . "\n";
                    echo "Porcentaje Victorias: " . $porcentajeVic . "%\n";
                    echo "Adivinadas:\n";
                    echo "   Intento 1 " . $intentoUno . "\n";
                    echo "   Intento 2 " . $intentoDos . "\n";
                    echo "   Intento 3 " . $intentoTres . "\n";
                    echo "   Intento 4 " . $intentoCuatro . "\n";
                    echo "   Intento 5 " . $intentoCinco . "\n";
                    echo "   Intento 6 " . $intentoSeis . "\n";
                    echo "***************************\n";
                } else {
                    echo "No hay partidas registradas para $nombreUsuario.\n";
                }
                break;
            
            case 6:
                $coleccionPartidasOrdenadas = ordenarPartidas($coleccionPartidas);
            
                foreach ($coleccionPartidasOrdenadas as $partida) {
                    echo "Palabra: {$partida['palabraWordix']}, Jugador: {$partida['jugador']}, Intentos: {$partida['intentos']}, Puntaje: {$partida['puntaje']}\n";
                }
            
                break;
        case 7:
            // Agregar una palabra de 5 letras a Wordix
            $nuevaPalabra = leerPalabra5Letras();
               
            // Verificar si la palabra ya existe en la colección
            if (in_array($nuevaPalabra, $coleccionPalabras)) {
                echo "La palabra ya existe en Wordix. Por favor, elige otra palabra.\n";
            } else {
                // Agregar la nueva palabra a la colección
                array_push($coleccionPalabras, $nuevaPalabra);
                echo "Palabra " . $nuevaPalabra . " agregada a Wordix.\n";
            }
            break;

        case 8:
            // Salir del juego
            echo "Gracias por jugar Wordix. ¡Hasta luego!\n";
            break;


        default:
            echo "Opción no válida. Intente nuevamente.\n";
            break;
    }
} while ($opcion != 8);