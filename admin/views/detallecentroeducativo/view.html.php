<?php

/*
 *
 *  Vista
 *  
 *  
 */

defined ( '_JEXEC' ) or die ( 'Acceso restringido' );

class centroseducativosViewdetallecentroeducativo extends JViewLegacy {
    
    function display($tpl = null)
    {

        $cabecera = "Centros educativos";
        $this->assignRef ( 'cabecera', $cabecera );

        if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
            echo "------------------------- <br> ";
            echo "Clase: ". __CLASS__ ." <br>";
            echo "Método: ". __METHOD__ ." <br>";
            echo "------------------------- <br> ";
        }
        
        /*
         * invocar al modelo para recuperar los datos
         */
        $item	=& $this->get('Data');
        $isNew	= ($item->id < 1);
        
        JToolBarHelper::title(   JText::_( 'Centros educativos: ficha' ) , 'generic.png' );
        JToolBarHelper::back(); 

        $this->assignRef('item', $item);

        parent::display($tpl);

    }
        
}
