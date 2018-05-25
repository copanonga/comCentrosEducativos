<?php

defined('_JEXEC') or die('Restricted access');

if (JRequest::getVar( 'DEBUG') == "SI") {
	echo "------------------------- <br> ";
	echo "estoy en .....:form.php   <br> "; 
	echo "------------------------- <br> ";
	}	
?>

<h1><?php echo $this->cabecera; ?> form</h1>


<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Añadir Centro educativo' ); ?></legend>

		<table class="admintable">
		<tr>
			<td width="100" align="right" class="key">
				<label for="Nombre">
					<?php echo JText::_( 'Nombre del centro' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="Nombre" 
				       id="NombreCentro" size="80" maxlength="250" 
				       value="<?php echo $this->item->nombre;?>" />
			</td>
		</tr>
	</table>
	</fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="option" value="com_centroseducativos" />
<input type="hidden" name="cid" value="<?php echo $this->item->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="centroseducativoscrud" />
</form>
