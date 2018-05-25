<?php
/*
 * ********************************************************* 
 * package com_hola04
 * file: admin\models\hola04.php
 * ********************************************************* 
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

class centroseducativosModelcentroseducativoscrud extends JModelLegacy
{
	/**
	 * Constructor que recupera el ID de la cadena de peticion
	 */
	function __construct()
	{
		if (JRequest::getVar( 'DEBUG') == "SI")
			echo "ejecutando la funcion __construct de centroseducativosModelcentroseducativosCRUD <BR>";
		parent::__construct();

		$array = JRequest::getVar('cid',  0, '', 'array');
		$this->setId((int)$array[0]);
	}
        
        /**
	 * Metodo para establecer el identificador 
	 *
	 * @param	int centroseducativosModelcentroseducativosCRUD identificador
	 * no devuelve nada
	 */
	function setId($id)
	{
		if (JRequest::getVar( 'traza') == "SI")
			echo "ejecutando la funcion setId con id=$id de centroseducativosModelcentroseducativosCRUD <BR>";
		// Asigna el id y elimina datos
		$this->_id		= $id;
		$this->_data	= null;
	}
        
        /**
	 * Metodo para obtener los datos
	 * devuelve un objeto con los datos
	 */
	function &getData()
	{
		if (JRequest::getVar( 'DEBUG') == "SI")
			echo "ejecutando la funcion getdata de centroseducativosModelcentroseducativosCRUD <BR>";
		// carga los datos
		if (empty( $this->_data )) {
			$query = ' SELECT * FROM #__centroseducativos '.
					'  WHERE id = '.$this->_id;
			if (JRequest::getVar( 'traza') == "SI")
				echo "\$query...: $query <BR>";
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
            
		if (JRequest::getVar( 'DEBUG') == "SI")
			echo "ejecutando la funcion store de centroseducativosModelcentroseducativosCRUD <BR>";
		
		if (JRequest::getVar( 'DEBUG') == "SI") {
			echo "------------------------- <br> ";
			echo "NombreCentro ....:". JRequest::getVar( 'NombreCentro') ." <br>";
			echo "cid... ....:". JRequest::getVar( 'cid') ." <br>";
			echo "------------------------- <br> ";
		}
		
		if (JRequest::getVar( 'NombreCentro')) {
                    
                    $query = "INSERT INTO #__centroseducativos (nombre) "
                   . "VALUES (" . "'". JRequest::getVar( 'NombreCentro') ."') ";
			
                          /*  
			if (0 == JRequest::getVar( 'cid')) {
				if (JRequest::getVar( 'DEBUG') == "SI")
					echo "ejecutando la funcion store opcion ALTA <BR>";

				$ultId  = $this->maxID();
				$newId  = $ultId + 1 ;
					
				$query = "INSERT INTO #__centroseducativos (nombre) "
                   . "VALUES (" . "'". JRequest::getVar( 'NombreCentro') ."') ";
			} else {
				if (JRequest::getVar( 'DEBUG') == "SI")
					echo "ejecutando la funcion store opcion UPDATE <BR>";
				$query = "UPDATE #__TablaHola04
							 SET Saludo = '" .JRequest::getVar( 'Saludo') ."' 
						   WHERE id=".JRequest::getVar( 'cid') ;				
			}
                        
                        */
			if (JRequest::getVar( 'DEBUG') == "SI")
				echo "Contenido de la variable query: " . $query . "<br>";
			$bd = JFactory::getDBO();
			$bd->setQuery( $query );
			$saludoBD = $bd->execute();
			if (JRequest::getVar( 'DEBUG') == "SI")
				echo "Contenido de la variable saludoBD: " . $saludoBD . "<br>";
                        
			return $saludoBD;			
		}	
		return TRUE;	
	}
        
        /**
	 * Method to delete record(s)
	 *
	 * @access	public
	 * @return	boolean	True on success
	 */
	function delete($id)
	{
		if (JRequest::getVar( 'DEBUG') == "SI")
			echo "delete: " . $id . "<br>";	
		#return true;
		if ($id) {
			if (JRequest::getVar( 'DEBUG') == "SI")
				echo "ejecutando la funcion delete <BR>";
		
			$query = "DELETE FROM #__centroseducativos "
					. "WHERE id=".$id ;
			if (JRequest::getVar( 'DEBUG') == "SI")
				echo "Contenido de la variable query: " . $query . "<br>";
			$bd = JFactory::getDBO();
			$bd->setQuery( $query );
			if (!$bd->execute()) {
				return $bd->getErrorMsg();
			} else 
				return "Se ha borrado con EXITO el registro de id: " .$id  ;
		}
	}
        
}