<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

class centroseducativosModelcentroseducativosCRUD extends JModelLegacy
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
			$this->_data->Saludo = null;
		}
		return $this->_data;
	}
        
        /**
	 * Metodo para establecer el identificador 
	 *
	 * @param	int centroseducativosCRUD identificador
	 * no devuelve nada
	 */
	function setId($id)
	{
		if (JRequest::getVar( 'DEBUG') == "SI")
			echo "ejecutando la funcion setId con id=$id de centroseducativosModelcentroseducativosCRUD <BR>";
		// Asigna el id y elimina datos
		$this->_id	= $id;
		$this->_data	= null;
	}

}