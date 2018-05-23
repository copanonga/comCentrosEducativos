<?php

defined ( '_JEXEC' ) or die ( 'Acceso restringido' );

class centroseducativosViewcentroseducativosCRUD extends JViewLegacy {
    
        function display($tpl = null)
	{
            
            $cabecera = "Centros educativos";
            $this->assignRef ( 'cabecera', $cabecera );
            
		if (JRequest::getVar( 'DEBUG') == "SI") {
			echo "------------------------- <br> ";
			echo "estoy en .....:". __CLASS__." <br>";
			echo "estoy en .....:". __METHOD__." <br>";
			echo "------------------------- <br> ";
		}
                
                $valorTexto =& $this->get( 'Patata');
                
                echo "Valor del texto devuelto CRUD: " . $valorTexto;
                
		parent::display($tpl);
		
	}
        
}
