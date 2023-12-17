<?php
include_once("wordix.php");

function primerPartidaGanda ($nombreJugador, $coleccionPartidas){
$PrimerGanador = null;
$i= 0;
while($i < count($coleccioPartidas)){
if ($coleccionPartidas [$i] ["jugador"] == $nombreJugador && $coleccionPartidas[$i]["puntaje"]>0){
    $PrimerGanador = $i;
 
} 
$i++;
}
}




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
/** Verifica si se uso la misma palabra
 * @param array $coleccionPart
 * @param string $palabra
 * @param string $jugador
 * @return boolean
 */
function verifMismaPalabra($coleccionPart, $palabra, $jugador) { 
    $i = 0; $n = count($coleccionPart);
    $valorVerdad = false;
    while ($i < $n && !$valorVerdad) { 
        if ($coleccionPart[$i]["palabraWordix"] === $palabra && $coleccionPart[$i]["jugador"] === $jugador) 
        { 
            $valorVerdad = true; 
    } 
    $i++;
    } 
    return $valorVerdad;
}

/** Crea un resumen de un jugador
 *@param array $partidasJugadas
 *@param string $nombreJugador
 *@return array
 */
function resumenJugador ($nombreJugador, $partidasJugadas){
//@param array $resumenJugador//
    $resumenJugador=[];

    $partidas = 0;
    $victorias = 0;
    $intentoUno = 0;
    $intentoDos = 0;
    $intentoTres = 0;
    $intentoCuatro = 0;
    $intentoCinco = 0;
    $intentoSeis = 0;
    $puntajeTotal = 0;

    foreach($partidasJugadas as $partidasJ){

        if($partidasJ["jugador"] == $nombreJugador){
        $partidas +=1;
        $puntajeTotal = $partidasJ["puntaje"]+$puntajeTotal;

        if ($partidasJ["puntaje"] > 0) {
            $victorias +=1;
        }

        switch ($partidasJ["intentos"]) {
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
    }
      
    }
    if($partidas != 0){
        $porcentajeVic = 100 / $partidas * $victorias;
        $resumenJugador=["nombre"=>$nombreJugador, "partidas"=>$partidas, "puntaje"=>$puntajeTotal, "victorias"=>$victorias,
     "porcentaje"=>(int)$porcentajeVic, "intento1"=>$intentoUno, "intento2"=>$intentoDos, "intento3"=>$intentoTres, "intento4"=>$intentoCuatro,
     "intento5"=>$intentoCinco, "intento6"=>$intentoSeis];

    }

    
return $resumenJugador;
}

/** Escribe el arreglo resumen del jugador
 * @param array $resumen
 */

function escribirResumen($resumen){


 echo "*******************************\n";
 echo "jugador " . $resumen["nombre"] . "\n";
 echo "partidas: " . $resumen["partidas"] . "\n";
 echo "Puntaje Total: " . $resumen["puntaje"] . "\n";
 echo "Victorias: " . $resumen["victorias"] . "\n";
 echo "Porcentaje Victorias: " . $resumen["porcentaje"] . "%\n";
 echo "Adivinadas:\n";
 echo " Intento 1 " . $resumen["intento1"] . "\n";
 echo " Intento 2 " . $resumen["intento2"] . "\n";
 echo " Intento 3 " . $resumen["intento3"] . "\n";
 echo " Intento 4 " . $resumen["intento4"] . "\n";
 echo " Intento 5 " . $resumen["intento5"] . "\n";
 echo " Intento 6 " . $resumen["intento6"] . "\n";
 echo "********************************\n";

}

/**Busca en un arreglo y debuenlve un indice numerico
 * @param
 */


/** Compara nombre de jugador y palabra de wordix para uasort
 *@param array $partidaA  //recordar que son arreglos asociativos/
 *@param array $partidaB
 *@return int
 */
function compara($partidaA,$partidaB){

    if($partidaA["jugador"]>$partidaB["jugador"]){
        $orden=1;
    }elseif($partidaA["jugador"]<$partidaB["jugador"]){
        $orden=-1;
    }else{
        if($partidaA["palabraWordix"]>$partidaB["palabraWordix"]){
            $orden=1;
        }elseif($partidaA["palabraWordix"]<$partidaB["palabraWordix"]){
            $orden=-1;
        }else{
            $orden=0;
        }
    }
    return $orden;
}


/** comprueba si el jugador existe y si tiene victorias
 * @param string $jugadorP
 * @param array $arregloPartidas
 * @return int
 */
function partidaJugador ($jugadorP,$arregloPartidas){
    $m=count($arregloPartidas);
    $i=0;
    $encontrado=false;
    $posicion=-2;

         while($i<$m && !$encontrado){
             if($arregloPartidas[$i]["jugador"]==$jugadorP) {
                 $posicion= -1;
                if($arregloPartidas[$i]["puntaje"]!= 0){
                    $encontrado=true;
                    $posicion=$i;
                }
                    
            }
                        $i +=1;
        }
        return $posicion;
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
                $indice = partidaJugador($nombreJugador,$coleccionPartidas);
                
                if ($indice == -2){
                    echo "*********************************************** \n";
                    echo "El jugador ". $nombreJugador. " no jugo ninguna partida \n";
                    echo "*********************************************** \n";

                }elseif($indice == -1){
                    echo "*********************************************** \n";
                    echo  $nombreJugador . " No registra partidas ganadas \n";
                    echo "*********************************************** \n";

                }else{
                    $partidaG=$coleccionPartidas[$indice];
                    imprimirResultadoDos($partidaG, $indice);
                }
                
            break;

            
        case 5:
                //crea y muestra el resumen de un jugador
                echo "Ingrese el nombre de usuario: ";
                $nombreUsuario = trim(fgets(STDIN));
            
                $resumenJugador = resumenJugador($nombreUsuario, $coleccionPartidas);
            
        
            
                if ($resumenJugador) {
                    echo "Resumen de $nombreUsuario:\n";
                    escribirResumen($resumenJugador);
            
                    
                } else {
                    echo "No hay partidas registradas para $nombreUsuario.\n";
                }
            break;
            
        case 6:
                //muestra un listado de partidas ordenadas por jugador y por palabra
                uasort($coleccionPartidas,"compara");//ordena un arreglo en base a una comparacion
                print_r($coleccionPartidas);//muestra el arreglo

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