<?php

defined ( '_JEXEC' ) or die ( 'Acceso restringido' );

class centroseducativosViewcentroseducativos extends JViewLegacy {
    
	function display($tpl = null) {
            
		$cabecera = "Centros educativos";
		$this->assignRef ( 'cabecera', $cabecera );
		
		parent::display ( $tpl );
                
	}
        
}
