<?php

defined ( '_JEXEC' ) or die ( 'Restricted access' );

if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

JRequest::setVar( 'DEBUG', "SI") ;

/*
 * *********************************************************
 * examinar parametross recibidos
 * *********************************************************
 */
/*** LEER VARIABLES POR GET ***/
if (JRequest::getVar( 'DEBUG') == "SI") {
	$numeroG = count($_GET);
	$tagsG = array_keys($_GET);// obtiene los nombres de las varibles
	$valoresG = array_values($_GET);// obtiene los valores de las varibles

	// muestra las variables y los valores pasadas en la cadena de peticion
    echo "GET: variables y valores <br> ";
	for($i=0 ; $i<$numeroG ; $i++){
	   echo $i .":" . $tagsG[$i] . " : " . $valoresG[$i] . "<br>";
	}
}
/*** LEER VARIABLES POR POST ***/
if (JRequest::getVar( 'DEBUG') == "SI") {
	$numeroP = count($_POST);
	$tagsP = array_keys($_POST); // obtiene los nombres de las varibles
	$valoresP = array_values($_POST);// obtiene los valores de las varibles

    echo "------------------------- <br> ";
	echo "POST: variables y valores <br>";
	for($i=0 ; $i<$numeroP ; $i++){
		if ( is_array($valoresP[$i]) ) {
			echo "Es array  ..:". $tagsP[$i]."<br>";
			echo "ocurrencias..:".count($valoresP[$i])."<br>";
			for($z=0 ; $z<count($valoresP[$i]) ; $z++){
			    echo "\$z....$z:" . $valoresP[$i][$z] . "<br>";
			}
		}	   
		echo $i .":" .$tagsP[$i] . " : " . $valoresP[$i] . "<br>";
	}
	echo "------------------------- <br> ";
}
/*
 * *********************************************************
 * Asignar CONTROLADOR
 * *********************************************************
 */	

/*
	$controller = '';
	switch (JRequest::getVar('task') ) {
		case 'nuevo':
		case 'save':
		case 'edit':
		case 'cancel':
		case 'predeterminado':
		case 'remove':
			$controller = 'hola04';
			break;
		default:
			$controller = '';
			break;
	}
      */  
        
JRequest::setVar( 'controller', $controller );
if (JRequest::getVar( 'DEBUG') == "SI") {
	echo "\$tarea..........:". JRequest::getVar('task')." <br> ";
	echo "\$controller.....: $controller <br> ";
}

require_once( JPATH_COMPONENT.DS.'controller.php' );

if($controller = JRequest::getVar('controller')) {
	$path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
	if (file_exists($path)) {
		require_once $path;
	} else {
		$controller = '';
	}
}

/*
 * *********************************************************
 * PROCESAR TAREA (TASK)
 * *********************************************************
 */
 // nombre del componente
$componente = "centroseducativos";

// Create the controller
$classname	= $componente .'Controller'.$controller;
if (JRequest::getVar( 'traza') == "SI") {
	echo "Contenido de la variable classname: " . $classname . "<br>";
}

$controller	= new $classname( );

// Perform the Request task
$controller->execute( JRequest::getVar( 'task' ) );

// Redirect if set by the controller
$controller->redirect();

