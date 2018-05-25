<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

class centroseducativosControllercentroseducativoscrud extends  JControllerForm
{
	/**
	 * constructor (registra tareas adicionales a los metodos)
	 * no devuelve nada
	 */
	function __construct()
	{
		if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
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
		if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
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
        
	/**
	 * salva un registro y redirecciona a la pagina principal
	 * no devuelve nada
	 */
	function save()
	{
		if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
			echo "------------------------- <br> ";
			echo "estoy en .....:". __CLASS__." <br>";
			echo "estoy en .....:". __METHOD__." <br>";
			echo "------------------------- <br> ";
		}
		
                $model = $this->getModel('centroseducativoscrud');
		if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG'))
			echo "acabo de crear el objeto model <BR>";
                                        
                if ($model->store()) {
			$msg = JText::_( 'Saludo guardado!' );
		} else {
			$msg = JText::_( 'Error al guardar el Saludo' );
		}
		
                if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
			echo "------------------------- <br> ";
			echo "\$msg ....:". $msg ." <br>";
			echo "------------------------- <br> ";
		}
				
		// carga un link con la cadena de peticion a la pagina principal 
		$link = 'index.php?option=com_centroseducativos';
		//redirecciona a la pagina principal 
		#die;
		$this->setRedirect($link, $msg);
	}

	/**
	 * Borra registros
	 * no devuelve nada
	 */
	function remove()
	{
		if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
			echo "------------------------- <br> ";
			echo "estoy en .....:". __CLASS__." <br>";
			echo "estoy en .....:". __METHOD__." <br>";
			echo "------------------------- <br> ";
		}
                
                
                
		$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
                print_r($cids);
                
		if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
			echo "count ....: " . count( $cids). " <br> ";
			if (count( $cids)) {
				$z = 0;
				foreach($cids as $cid) {
					echo "$z..id: $cid <br>";
					$z ++;
				}
			}
		}
		
		if (count( $cids)) {
			
			if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG'))
				echo "count ....: " . count( $cids). " <br> ";
			
			$model = $this->getModel('centroseducativoscrud');
			$z = 0;
			foreach($cids as $cid) {
                            $aux = $model->delete($cid);
                            $msg[$z]= $aux;
                            echo "\$id..$cid: $aux  <br>";
                            $z ++;
			}
			$mensaje = implode("<br>", $msg);
		}
		
        /*
         * antes de borraar hay que comprobar que no es el valor por defecto 
         */
		$this->setRedirect( 'index.php?option=com_centroseducativos', $mensaje );
	}

	/**
	 * cancela la edicion de un registro
	 * no devuelve nada
	 */
	function cancel()
	{
		if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
			echo "------------------------- <br> ";
			echo "estoy en .....:". __CLASS__." <br>";
			echo "estoy en .....:". __METHOD__." <br>";
			echo "------------------------- <br> ";
		}
		$msg = JText::_( 'Operacion Cancelada por el usuario' );
		$this->setRedirect( 'index.php?option=com_centroseducativos', $msg );
	}
	
	/**
	 * Esta funcion establece un saludo como saludo predeterminado
	 * no devuelve nada
	 */
	function predeterminado()
	{
		
		if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
			echo "------------------------- <br> ";
			echo "estoy en .....:". __CLASS__." <br>";
			echo "estoy en .....:". __METHOD__." <br>";
			echo "------------------------- <br> ";
		}
		// Obtener el id del saludo que  se debe establecer como predeterminado
		$cid	= JRequest::getVar( 'cid', null, 'post', 'array' );
        $n		= count( $cid );
        echo "Numero de elementos del array n: " . $n ."<BR>";
        
        $id		=  $cid[0] ;
        echo "Id del registro que se debe establecer como predeterminado: " . $id . "<BR>";
        
        // establecer la referencia a la Base de datos
        $bd =& JFactory::getDBO();
        
        // query SQL para quitar todas las marcas de predeterminado
        $query = 'UPDATE  #__Tablahola04 SET predeterminado = 0';
        echo "Contenido de la variable query: " . $query . "<br>";
        
        // almacenar y ejecutar el query SQL
        $bd->setQuery( $query );
        $msg = $bd->execute();

        // query SQL para marcar un registro como predeterminado
        $query = 'UPDATE  #__Tablahola04 SET predeterminado = 1 WHERE id='. $id;
        echo "Contenido de la variable query: " . $query . "<br>";
        
        // almacenar y ejecutar el query SQL
        $bd->setQuery( $query );
        $regActuaalizados = $bd->execute();
        if ($regActuaalizados == 1) 
        	$msg = "Se ha establecido con exito el valor por defecto ID=" . $id;
        else $msg = "No se ha podido completar la operacióon con exito.";
		// redireccionar a la pagina principal
        $this->setRedirect( 'index.php?option=com_centroseducativos', $msg );
	}
	
	function getIdPredeterminado()
	{
		 $bd =& JFactory::getDBO();
		 $query = 'SELECT id 
		 		     FROM #__TablaHola04 
		 		    WHERE predeterminado = 1';
		 if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG'))
			echo "Contenido de la variable query: " . $query . "<br>";
		
		 $bd->setQuery( $query );
		 $idPre = $bd->loadResult();
		 if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG'))
			echo "Id del saludo predeterminado: " . $idPre . "<br>";
		 return $idPre;
	}
}