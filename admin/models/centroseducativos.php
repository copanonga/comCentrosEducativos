<?php

/*
 *
 *  Modelo
 *  
 *  
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

class centroseducativosModelcentroseducativos extends JModelLegacy
{
 
    var $_data;

    function _buildQuery()
    {
      
        $this->mostrarZona(__CLASS__,__METHOD__);

        $query = ' SELECT * FROM #__centroseducativos';

        return $query;
        
    }

    function getData()
    {
        
        $this->mostrarZona(__CLASS__,__METHOD__);

        if (empty( $this->_data ))
        {
                
            $query = $this->_buildQuery();
            $this->_data = $this->_getList( $query );
            
        }

        return $this->_data;
        
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