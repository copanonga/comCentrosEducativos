<?php

/*
 *
 *  Vista
 *  
 *  
 */

defined ( '_JEXEC' ) or die ( 'Acceso restringido' );

class centroseducativosViewcentroseducativoscrud extends JViewLegacy {
    
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
        
        /* 
        * cargar texto para el titulo
        */
        if ($isNew) $text = JText::_( ' Nuevo' ) ;
          else  $text = JText::_( ' Editar' );
        /*
        * Configurar la barra de herramientas
        */
        JToolBarHelper::title(   JText::_( 'Centros educativos:'. $text ) , 'generic.png' );
        JToolBarHelper::save();

        if ($isNew)  {
               JToolBarHelper::cancel();
        } else {
               // Si estamos editando le nombramos como CERRAR
               JToolBarHelper::cancel( 'cancel', 'Cerrar' );
        }

        $this->assignRef('item', $item);

        parent::display($tpl);

    }
        
}
