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
        
        $numeroG = count($_GET);
        $tagsG = array_keys($_GET);
        $valoresG = array_values($_GET);

        $isShowCenter = 0;
        for($i=0 ; $i<$numeroG ; $i++){

           if ($valoresG[$i] == "showcenter") {

               $isShowCenter = 1;
           }
        }

        /*
         * invocar al modelo para recuperar los datos
         */
        $item	=& $this->get('Data');
        $isNew	= ($item->id < 1);
        
        
        if ($isShowCenter == 0) {
            echo "Mostrar texto título";
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
        
        } else {
            
            JToolBarHelper::title(   JText::_( 'Centros educativos: ficha' ) , 'generic.png' );
            JToolBarHelper::back();   
            
        }
        
        

        $this->assignRef('item', $item);

        parent::display($tpl);

    }
        
}
