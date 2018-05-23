<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

class centroseducativosControllercentroseducativosCRUD extends  JControllerForm
{
	/**
	 * constructor (registra tareas adicionales a los metodos)
	 * no devuelve nada
	 */
	function __construct()
	{
		if (JRequest::getVar( 'DEBUG') == "SI") {
			echo "------------------------- <br> ";
			echo "estoy en .....:". __CLASS__." <br>";
			echo "estoy en .....:". __METHOD__." <br>";
			echo "------------------------- <br> ";
		}
		parent::__construct();

		//  asigna una tarea a un metodo ... es como crear un alias
		$this->registerTask( 'nuevo' , 'edit' );
	}
        
        /**
	 * displaya el form de edicion
	 * no devuelve nada
	 */
	function edit()
	{
		if (JRequest::getVar( 'DEBUG') == "SI") {
			echo "------------------------- <br> ";
			echo "estoy en .....:". __CLASS__." <br>";
			echo "estoy en .....:". __METHOD__." <br>";
			echo "------------------------- <br> ";
		}
		
                JRequest::setVar( 'view', 'centroseducativoscrud' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);
                
                if($controller = JRequest::getVar('controller')) {
	$path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
        echo "Path CRUD: " . $path;
                }
                
                //die("crud");

		parent::display();
	}
        
}