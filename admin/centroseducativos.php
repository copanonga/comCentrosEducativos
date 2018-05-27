<?php

defined ( '_JEXEC' ) or die ( 'Acceso restringido' );

if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

JRequest::setVar( 'DEBUG', "SI") ;
//JRequest::setVar( 'ACTIVAR_DEBUG', "SI") ;
JRequest::setVar( 'ACTIVAR_DEBUG', "NO") ;

if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
    
    $numeroG = count($_GET);
    $tagsG = array_keys($_GET);
    $valoresG = array_values($_GET);

    echo "------------------------- <br> ";
    echo "GET: variables y valores <br> ";
    
    for($i=0 ; $i<$numeroG ; $i++){
       echo $i .":" . $tagsG[$i] . " : " . $valoresG[$i] . "<br>";
    }
    
}

if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
    
    $numeroP = count($_POST);
    $tagsP = array_keys($_POST);
    $valoresP = array_values($_POST);

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

//Asignar controlador
$controller = '';
switch (JRequest::getVar('task') ) {
    case 'nuevo':
    case 'showcenter':
    case 'save':
    case 'edit':
    case 'cancel':
    case 'predeterminado':
    case 'remove':
            $controller = 'centroseducativoscrud';
            break;
    default:
            $controller = '';
            break;
}
          
JRequest::setVar( 'controller', $controller );
if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
    echo "Tarea:". JRequest::getVar('task')." <br> ";
    echo "Controlador: $controller <br> ";
    echo "------------------------- <br> ";
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

 //Procesar tareas (task)
$componente = "centroseducativos";

$classname	= $componente .'Controller'.$controller;
if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
	echo "Classname: " . $classname . "<br>";
        echo "------------------------- <br> ";
}

$controller	= new $classname( );
$controller->execute( JRequest::getVar( 'task' ) );
$controller->redirect();