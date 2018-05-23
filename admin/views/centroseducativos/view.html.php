<?php

defined ( '_JEXEC' ) or die ( 'Acceso restringido' );

class centroseducativosViewcentroseducativos extends JViewLegacy {
    
	function display($tpl = null) {
            
            $cabecera = "Centros educativos";
            $this->assignRef ( 'cabecera', $cabecera );

            $this->crearBarraHerramientas();

            parent::display ( $tpl );
                
	}
        
        function crearBarraHerramientas () {
            
            /*
             * Configurar la barra de herramientas
             */
            JToolBarHelper::title(   JText::_( 'Centros educativos' ), 'generic.png' );

            #function addNew($task = 'add', $alt = 'JTOOLBAR_NEW', $check = false)
            JToolBarHelper::addNew($task = 'nuevo', $alt = 'Nuevo', $check = false);

            #function editList($task = 'edit', $alt = 'JTOOLBAR_EDIT')
            JToolBarHelper::editList($task = 'edit', $alt = 'Editar');

            #function makeDefault($task = 'default', $alt = 'JTOOLBAR_DEFAULT')
            JToolBarHelper::makeDefault ($task = 'predeterminado', $alt = 'Valor por defecto');

            #function deleteList($msg = '', $task = 'remove', $alt = 'JTOOLBAR_DELETE')
            JToolBarHelper::deleteList($msg = '', $task = 'remove', $alt = 'Borrar');
            
        }
        
}
