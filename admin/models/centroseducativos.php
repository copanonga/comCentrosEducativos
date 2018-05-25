<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

class centroseducativosModelcentroseducativos extends JModelLegacy
{
	/**
	 *  @var array
	 */
	var $_data;

	/**
	 * devuelve la cadena con el comando que se usara para recuperar los datos
	 */
	function _buildQuery()
	{
		if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
			echo "------------------------- <br> ";
			echo "estoy en .....:". __CLASS__." <br>";
			echo "estoy en .....:". __METHOD__." <br>";
			echo "------------------------- <br> ";
		}
		
		$query = ' SELECT * '
			     . ' FROM #__centroseducativos '
		;

		return $query;
	}

	/**
	 * recupera los datos de la tabla Tablahola04 
	 * devuelve un array de objetos conteniendo los datos
	 */
	function getData()
	{
		if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
			echo "------------------------- <br> ";
			echo "estoy en .....:". __CLASS__." <br>";
			echo "estoy en .....:". __METHOD__." <br>";
			echo "------------------------- <br> ";
		}
		
		// cargamos los datos si está vacio el array
		if (empty( $this->_data ))
		{
			//recupera el comando a ejecutar
			$query = $this->_buildQuery();
			
			//recupera los datos
			$this->_data = $this->_getList( $query );
		}

		//devuelve los datos
		return $this->_data;
	}
        
        function getPatata()
	{
		if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
			echo "------------------------- <br> ";
			echo "estoy en .....:". __CLASS__." <br>";
			echo "estoy en .....:". __METHOD__." <br>";
			echo "------------------------- <br> ";
		}
		
		return "Devolver patata";
	}
        
}