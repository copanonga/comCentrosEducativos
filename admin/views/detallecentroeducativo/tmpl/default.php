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

<h1><?php echo $this->cabecera; ?> Detalle centro</h1>

<h1><?php echo $this->item->nombre; ?></h1>

<ul>
    <li>Dirección: <?php echo $this->item->direccion; ?></li>
    <li>Municipio: <?php echo $this->item->municipio; ?></li>
    <li>provincia: <?php echo $this->item->provincia; ?></li>
    <li>País: <?php echo $this->item->pais; ?></li>
    <li>CP: <?php echo $this->item->cp; ?></li>
    <li>Teléfono 01: <?php echo $this->item->telefono01; ?></li>
    <li>Teléfono 02: <?php echo $this->item->telefono02; ?></li>
    <li>e-mail: <?php echo $this->item->email; ?></li>
    <li>Observaciones: <?php echo $this->item->observaciones; ?></li>
    <li>Fecha de alta: <?php echo $this->item->fechaalta; ?></li>
    <li>Fecha de baja: <?php echo $this->item->fechabaja; ?></li>
    <li>Predeterminado: <?php echo $this->item->predeterminado; ?></li>
</ul>