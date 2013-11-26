<?php
/**
 * @version		$Id: default.php 2013-10-29
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');
JHtml::_('behavior.framework');
JHtml::_('bootstrap.framework');
JHtml::_('bootstrap.framework');

$document = JFactory::getDocument();
$document->addStyleSheet('media/com_thorhospedaje/css/th_productor.css');
$document->addStyleSheet('media/com_thorhospedaje/css/jquery-themes/jquery-ui.min.css');
$document->addStyleSheet(JURI::base().'media/jui/css/chosen.css');
$document->addScript('media/com_thorhospedaje/js/jquery-ui.min.js');
$document->addScript(JURI::base().'media/jui/js/chosen.jquery.js');
$document->addScriptDeclaration("
jQuery(document).ready(function($) {
	$('#img_country_1' ).click(function() {
		$('#country_1').val('checked', true);
	});
	
	$('#img_country_2' ).click(function() {
		$('#country_2').attr('checked', true);
	});
	
	$('#img_country_3' ).click(function() {
		$('#country_3').attr('checked', true);
	});
	
	$('#img_country_0' ).click(function() {
		$('#country_0').attr('checked', true);
	});
	
	
	
	$('#img_plan_1' ).click(function() {
		$('#plan').val('1');
	});
	
	$('#img_plan_2' ).click(function() {
		$('#plan').val('2');
	});
});
");

?>
<div class="mod_th_productor">
<div class="span3">
	<br><br><br /><br />
	<img style="width:80%;" src="media/com_thorhospedaje/images/posaderos/te_ofrecemos.png" />
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br>
	<img style="width:80%;" src="media/com_thorhospedaje/images/posaderos/cielo_aviso.png" />
</div>

<div class="span9">
	<br><br>
	<div class="row-fluid">
		<img src="media/com_thorhospedaje/images/productor/ruta_pago.png" />
	</div>


<h2><?php echo JText::_('TH_POSADERO_PAY_MESSAGE_TITLE'); ?></h2>

<form action="<?php echo JRoute::_("");?>" method="POST" class="form-inline">


<!-- Seleccionar pais -->
<?php echo $this->loadTemplate('country'); ?>

<!-- Seleccionar plan -->
<?php echo $this->loadTemplate('plan'); ?>

<!-- Pago -->
<?php echo $this->loadTemplate('pago'); ?>



<!-- Hotel -->
<?php //echo $this->loadTemplate('asset'); ?>

<!-- Hotel -->
<?php //echo $this->loadTemplate('conditions'); ?>

<div class="row-fluid">
	<div class="span6">
		<a href="index.php?option=com_thorhospedaje&view=productor" target="_self">
			<img style="width:60%; float: left;" src="media/com_thorhospedaje/images/comunes/atras.png" width="60%"/>
		</a>
	</div>
	<div class="span6">
		<a href="index.php?option=com_thorhospedaje&view=productor&layout=success" target="_self">
			<img style="width:60%; float: right;" src="media/com_thorhospedaje/images/comunes/pagar.png" width="60%"/>
		</a>
	</div>
</div>
</form>
</div>
</div>
