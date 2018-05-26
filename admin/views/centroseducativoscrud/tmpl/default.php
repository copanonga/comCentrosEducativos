<?php

/*
 *
 *  Vista tmpl
 *  
 *  
 */

defined ( '_JEXEC' ) or die ( 'Acceso restringido' );

if (JRequest::getVar( 'DEBUG') == JRequest::getVar( 'ACTIVAR_DEBUG')) {
    echo "------------------------- <br> ";
    echo "Clase: ". __CLASS__ ." <br>";
    echo "Método: ". __METHOD__ ." <br>";
    echo "------------------------- <br> ";
}
        
?>

<h1><?php echo $this->cabecera; ?> default CRUD</h1>
