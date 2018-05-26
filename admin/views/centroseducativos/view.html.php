<?php

/*
 *
 *  Vista
 *  
 *  
 */

defined ( '_JEXEC' ) or die ( 'Acceso restringido' );

class centroseducativosViewcentroseducativos extends JViewLegacy {
    
    function display($tpl = null) {

        $this->mostrarZona(__CLASS__,__METHOD__);
        
        $cabecera = "Centros educativos";
        $this->assignRef ( 'cabecera', $cabecera );

        $this->crearBarraHerramientas();

        $items	=& $this->get( 'Data');

        // control de errores
        if (count($errors = $this->get('Errors')))
        {
                JError::raiseError(500, implode('<br />', $errors));
                return false;
        }

        $this->assignRef('items',		$items);

        parent::display ( $tpl );

    }

    function crearBarraHerramientas () {

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
    
    function mostrarZona($clase,$metodo){
        
        if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
            echo "------------------------- <br> ";
            echo "Clase: ". $clase ." <br>";
            echo "Método: ". $metodo ." <br>";
            echo "------------------------- <br> ";
        }
        
    }
        
}
