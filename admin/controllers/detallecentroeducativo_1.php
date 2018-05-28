<?php

/*
 *
 *  Modelo
 *  
 *  
 */

defined( '_JEXEC' ) or die( 'Acceso restringido' );

class centroseducativosModeldetallecentroeducativo extends JModelLegacy
{
    
    /**
     * Constructor que recupera el ID de la cadena de peticion
     */
    function __construct()
    {

        $this->mostrarZona(__CLASS__,__METHOD__);
        
        parent::__construct();

        $array = JRequest::getVar('cid',  0, '', 'array');
        $this->setId((int)$array[0]);

    }
        
    /**
     *  Asigna el id y elimina datos
     *
     * @param	int centroseducativosModelcentroseducativosCRUD identificador
     * no devuelve nada
     */
    function setId($id)
    {
        
        $this->mostrarZona(__CLASS__,__METHOD__);
        
        $this->_id  = $id;
        $this->_data = null;
        
    }
        
    /**
     * Metodo para obtener los datos
     * devuelve un objeto con los datos
     */
    function &getData()
    {
        
        $this->mostrarZona(__CLASS__,__METHOD__);
        
        // carga los datos
        if (empty( $this->_data )) {
            
            $query = ' SELECT * FROM #__centroseducativos '.
                            '  WHERE id = '.$this->_id;
            $this->_db->setQuery( $query );
            $this->_data = $this->_db->loadObject();
            
        }
        
        if (!$this->_data) {
            
            $this->_data = new stdClass();
            $this->_data->id = 0;
            $this->_data->nombre = null;
            
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