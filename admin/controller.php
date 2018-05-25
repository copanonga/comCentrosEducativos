<?php
/*
 * ********************************************************* 
 * controller.php
 * ********************************************************* 
 */

defined ( '_JEXEC' ) or die ( 'Acceso restringido' );

class centroseducativosController extends JControllerLegacy {
	
	public function display($cachable = false, $urlparams = array())
	{

		if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
			echo "------------------------- <br> ";		
			echo "estoy en .....:". __CLASS__." <br>";
			echo "estoy en .....:". __METHOD__." <br>";
			echo "------------------------- <br> ";
			echo "ejecutando la funcion display de centroseducativosController <BR>";
		}
		parent::display();
	}
}

