<?php

defined('_JEXEC') or die('Restricted access');

if (JRequest::getVar( 'DEBUG') == "SI") {
	echo "------------------------- <br> ";
	echo "estoy en .....:form.php   <br> "; 
	echo "------------------------- <br> ";
	}	
?>

<h1><?php echo $this->cabecera; ?> form</h1>