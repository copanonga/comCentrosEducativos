<?php

/*
 *
 *  Modelo
 *  
 *  
 */

defined( '_JEXEC' ) or die( 'Acceso restringido' );

class centroseducativosModelcentroseducativoscrud extends JModelLegacy
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
        
    /**
     * Metodo para almacenar un registro
     * devuelve una variable booleana con valor true ha finalizado con exito
     */
    function store()
    {

        $this->mostrarZona(__CLASS__,__METHOD__);
        
        if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
                echo "------------------------- <br> ";
                echo "NombreCentro ....:". JRequest::getVar( 'NombreCentro') ." <br>";
                echo "cid... ....:". JRequest::getVar( 'cid') ." <br>";
                echo "------------------------- <br> ";
        }

        if (JRequest::getVar( 'NombreCentro')) {

            if (0 == JRequest::getVar( 'cid')) {

                $query = "INSERT INTO #__centroseducativos (nombre) "
                . "VALUES (" . "'". JRequest::getVar( 'NombreCentro') ."') ";

            } else {

                $query = "UPDATE #__centroseducativos
                SET nombre = '" .JRequest::getVar( 'NombreCentro') ."' 
                WHERE id=".JRequest::getVar( 'cid') ;				

            }

            if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
                echo "Query: " . $query . "<br>";
                echo "------------------------- <br> ";
            }

            $bd = JFactory::getDBO();
            $bd->setQuery( $query );
            $centroBD = $bd->execute();
            if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
                echo "centroBD: " . $centroBD . "<br>";
                echo "------------------------- <br> ";
            }

            return $centroBD;			
                
        }	
        
        return TRUE;	
        
    }
    
    function delete($id)
    {
        
        $this->mostrarZona(__CLASS__,__METHOD__);
        
        if ($id) {

            $query = "DELETE FROM #__centroseducativos "
                            . "WHERE id=".$id ;
            
            if (JRequest::getVar( 'DEBUG') == "SI") {
                echo "Query: " . $query . "<br>";
                echo "------------------------- <br> ";
            }
                    
            $bd = JFactory::getDBO();
            $bd->setQuery( $query );
            if (!$bd->execute()) {
                    return $bd->getErrorMsg();
            } else 
                    return "Se ha borrado con EXITO el registro de id: " .$id  ;
        }
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