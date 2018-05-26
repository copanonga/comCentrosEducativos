<?php

defined ( '_JEXEC' ) or die ( 'Acceso restringido' );

class centroseducativosController extends JControllerLegacy {
	
    public function display($cachable = false, $urlparams = array())
    {

        if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
            echo "------------------------- <br> ";
            echo "Clase: ". __CLASS__ ." <br>";
            echo "Método: ". __METHOD__ ." <br>";
            echo "------------------------- <br> ";
        }

        parent::display();

    }
    
}

