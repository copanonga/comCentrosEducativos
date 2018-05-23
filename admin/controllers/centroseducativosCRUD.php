<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

class centroseducativosModelcentroseducativosCRUD extends  JControllerForm
{
	/**
	 * constructor (registra tareas adicionales a los metodos)
	 * no devuelve nada
	 */
	function __construct()
	{
		if (JRequest::getVar( 'traza') == "SI") {
			echo "------------------------- <br> ";
			echo "estoy en .....:". __CLASS__." <br>";
			echo "estoy en .....:". __METHOD__." <br>";
			echo "------------------------- <br> ";
		}
		parent::__construct();

		//  asigna una tarea a un metodo ... es como crear un alias
		$this->registerTask( 'nuevo' , 'edit' );
	}
        
        
        
}