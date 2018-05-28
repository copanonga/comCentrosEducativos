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

<h1><?php echo $this->cabecera; ?></h1>

<form action="index.php?option=com_centroseducativos&view=centroseducativosCRUD" 
      method="post" 
      id="adminForm" 
      name="adminForm">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th width="3%">
                        <?php echo JText::_( 'ID' ); ?>
                </th>
                <th width="3%">
                        <?php echo JHtml::_('grid.checkall'); ?>
                </th>
                <th width="5%">
                        <?php echo JText::_( 'Predeterminado' ); ?>
                </th>
                <th width="75%">
                        <?php echo JText::_( 'Nombre del centro' ); ?>
                </th>
                <th width="75%">
                        <?php echo JText::_( 'Ver ficha' ); ?>
                </th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($this->items)) : ?>
                <?php foreach ($this->items as $i => $row) :
                    $link = JRoute::_(
                                    'index.php?option=com_centroseducativos&controller=centroseducativoscrud&task=edit&cid='
                                              . $row->id);

                    $linkDetail = JRoute::_(
                                    'index.php?option=com_centroseducativos&controller=detallecentroeducativo&task=showcenter&cid='
                                              . $row->id);
                    
                    $Marcado = "";
                    if (1 == $row->predeterminado) $Marcado = "checked";
                    
                    ?>
                    <tr>
                        <td align="center">
                                <?php echo $row->id; ?>
                        </td>
                        <td>
                                <?php echo JHtml::_('grid.id', $i, $row->id); ?>
                        </td>
                        <td text-align="center">
                                <input type="checkbox" name="Predeterminado" disabled="disabled"
                                   value="<?php echo $row->predeterminado; ?>" 
                                   <?php echo $Marcado; ?>> 
                        </td>					
                        <td>
                                <a href="<?php echo $link; ?>" 
                                   title="<?php echo JText::_('Nombre del centro'); ?>">
                                        <?php echo $row->nombre; ?>
                                </a>
                        </td>
                        <td>
                                <a href="<?php echo $linkDetail; ?>" 
                                   title="<?php echo JText::_('Nombre del centro'); ?>">
                                        <?php echo $row->nombre; ?>
                                </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <input type="hidden" name="controller" value="hola04"/>
    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="boxchecked" value="0"/>

    <?php echo JHtml::_('form.token'); ?>
        
</form>