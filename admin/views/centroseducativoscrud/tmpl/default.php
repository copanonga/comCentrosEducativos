<?php
defined ( '_JEXEC' ) or die ( 'Acceso restringido' );

if (JRequest::getVar( 'DEBUG') == "SI") {
	echo "------------------------- <br> ";
	echo "estoy en .....:default.php<br> "; 
	echo "------------------------- <br> ";
	}
        
?>

<h1><?php echo $this->cabecera; ?> default CRUD</h1>
