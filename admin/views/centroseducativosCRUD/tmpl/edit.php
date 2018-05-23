<?php
/*
 * ********************************************************* 
 * package com_hola04
 * file: admin\views\hola04\tmpl\edit.php
 * ********************************************************* 
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

?>
<form action="index.php" method="post" name="adminForm">
<div id="editcell">
	<table class="adminlist">
	<thead>
		<tr>
			<th width="5">
				<?php echo JText::_( 'ID' ); ?>
			</th>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>
			<th width="40">
				<?php echo JText::_( 'Predeterminado' ); ?>
			</th>
			<th>
				<?php echo JText::_( 'Nombre del centro' ); ?>
			</th>
		</tr>
	</thead>
	<?php
	$k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)	{
		$row = &$this->items[$i];
		$checked 	= JHTML::_('grid.id',   $i, $row->id );
		$link 		= JRoute::_( 'index.php?option=com_centroseducativos&controller=centroseducativosCRUD&task=edit&cid[]='. $row->id );
		/*
		echo "Contenido del campo ID: " . $row->id . "<br>";
		echo "Contenido del campo Predeterminado: " . $row->predeterminado . "<br>";
		echo "Contenido del campo Saludo: " . $row->nombre . "<br>";
		*/
		$Marcado = "";
		if (1 == $row->predeterminado) $Marcado = "checked";
		?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $row->id; ?>
			</td>
			<td>
				<?php echo $checked; ?>
			</td>
			<td align="center">
			    <input type="checkbox" name="Predeterminado" disabled="disabled"
			           value="<?php echo $row->predeterminado; ?>" <?php echo $Marcado; ?>> 
			</td>
			<td>
				<a href="<?php echo $link; ?>"><?php echo $row->nombre; ?></a>
			</td>
		</tr>
		<?php
		$k = 1 - $k;
	}
	?>
	</table>
</div>

<input type="hidden" name="option" value="com_centroseducativos" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="centroseducativosCRUD" />
</form>
