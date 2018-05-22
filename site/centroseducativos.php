<?php

defined ( '_JEXEC' ) or die ( 'Acceso restringido' );

if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

JRequest::setVar( 'DEBUG', "SI") ;

$ruta_controler = JPATH_COMPONENT . DS . 'controller.php';

echo "<h1>Centros educativos</h1>";

if (JRequest::getVar( 'traza') == "SI") {
    
    echo "Ruta: " . JURI::current() . "\n";
    
}

if (!file_exists($ruta_controler)) {
	return JError::raiseWarning(404, JText::_('Este componente es para el front-end'));
} 

// Incluye el controlador base
require_once ($ruta_controler);

// determinar si se ha solicitado el uso de un controlador especifico
// mediante el argumento '&controller=controlador' en la URL.
if ($controller = JRequest::getWord ( 'controller' )) {
	$path = JPATH_COMPONENT . DS . 'controllers' . DS . $controller . '.php';
	if (file_exists ( $path )) {
		require_once $path;
	} else {
		$controller = '';
	}
}

// Crear el objeto controlador
$classname = 'centroseducativosController' . $controller;
$controller = new $classname ();

// invoca a la tarea solicitada en la cadena de peticion
$controller->execute ( JRequest::getVar ( 'task' ) );

// ejecuta el Redirect definido en el controlador
$controller->redirect ();

