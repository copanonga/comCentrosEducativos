<?php

/*
 *
 *  Controlador
 *  
 *  
 */

defined( '_JEXEC' ) or die( 'Acceso restringido' );

class centroseducativosControllerdetallecentroeducativo extends  JControllerForm
{
    
    function __construct()
    {
        
        $this->mostrarZona(__CLASS__,__METHOD__);
        
        parent::__construct();

    }
    
    function showcenter()
    {
        
        $this->mostrarZona(__CLASS__,__METHOD__);
        
        JRequest::setVar( 'view', 'detallecentroeducativo' );
        JRequest::setVar( 'layout', 'default'  );

        parent::display();
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