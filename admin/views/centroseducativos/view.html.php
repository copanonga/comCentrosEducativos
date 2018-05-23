<?php

defined ( '_JEXEC' ) or die ( 'Acceso restringido' );

class centroseducativosViewcentroseducativos extends JViewLegacy {
    
	function display($tpl = null) {
            
            $cabecera = "Centros educativos";
            $this->assignRef ( 'cabecera', $cabecera );

            $this->crearBarraHerramientas();
            
            /*
		 * invocar al modelo para recuperar los datos
		 */
            
                $valorTexto =& $this->get( 'Patata');
                
                echo "Valor del texto devuelto: " . $valorTexto;
                
		$items	=& $this->get( 'Data');
		
		// control de errores
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		$this->assignRef('items',		$items);

		if (JRequest::getVar( 'DEBUG') == "SI") {
			echo "invocando la funcion display del padre para presentar 
				el layout de Hola04ppalViewHola04ppal <BR>";
		}

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
