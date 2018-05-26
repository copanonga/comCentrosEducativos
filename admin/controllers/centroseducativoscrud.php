<?php

/*
 *
 *  Controlador
 *  
 *  
 */

defined( '_JEXEC' ) or die( 'Acceso restringido' );

class centroseducativosControllercentroseducativoscrud extends  JControllerForm
{
    
    function __construct()
    {
        
        $this->mostrarZona(__CLASS__,__METHOD__);
        
        parent::__construct();

        //Asigna una tarea a un método
        $this->registerTask( 'nuevo' , 'edit' );
        
    }
       
    function edit()
    {
        
        $this->mostrarZona(__CLASS__,__METHOD__);

        JRequest::setVar( 'view', 'centroseducativoscrud' );
        JRequest::setVar( 'layout', 'form'  );
        JRequest::setVar('hidemainmenu', 1);

        parent::display();
    }
        
    function save()
    {
        
        $this->mostrarZona(__CLASS__,__METHOD__);

        $model = $this->getModel('centroseducativoscrud');
        
        if ($model->store()) {
                $msg = JText::_( 'Centro educativo guardado!' );
        } else {
                $msg = JText::_( 'Error al guardar el Centro educativo' );
        }

        if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
                echo "------------------------- <br> ";
                echo "Mensaje al guardar centro ....:". $msg ." <br>";
                echo "------------------------- <br> ";
        }

        $link = 'index.php?option=com_centroseducativos';
        $this->setRedirect($link, $msg);

    }

    function remove()
    {
        
        $this->mostrarZona(__CLASS__,__METHOD__);

        $cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
        
        if (count( $cids)) {

            $model = $this->getModel('centroseducativoscrud');
            $z = 0;
            
            foreach($cids as $cid) {
                $aux = $model->delete($cid);
                $msg[$z]= $aux;
                $z ++;
            }
            
            $mensaje = implode("<br>", $msg);
            
        }

        $this->setRedirect( 'index.php?option=com_centroseducativos', $mensaje );
        
    }

    function cancel()
    {
        
        $this->mostrarZona(__CLASS__,__METHOD__);
        
        $msg = JText::_( 'Operacion Cancelada por el usuario' );
        $this->setRedirect( 'index.php?option=com_centroseducativos', $msg );
        
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