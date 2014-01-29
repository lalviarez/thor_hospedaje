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
$document->addStyleSheet('media/com_thorhospedaje/css/th_posadero.css');
$document->addStyleSheet('media/com_thorhospedaje/css/jquery-themes/jquery-ui.min.css');
$document->addStyleSheet(JURI::base().'media/jui/css/chosen.css');
$document->addScript('media/com_thorhospedaje/js/jquery-ui.min.js');
$document->addScript(JURI::base().'media/jui/js/chosen.jquery.js');
$document->addScriptDeclaration("
jQuery(document).ready(function($) {
	$('#img_country_1' ).click(function() {
		$('#country_1').attr('checked', true).change();
		$('#pay-box').show();
		$('#pay-box-venezuela').hide();
	});
	
	$('#img_country_2' ).click(function() {
		$('#country_2').attr('checked', true).change();
		$('#pay-box').show();
		$('#pay-box-venezuela').hide();
	});
	
	$('#img_country_3' ).click(function() {
		$('#country_3').attr('checked', true).change();
		$('#pay-box').hide();
		$('#pay-box-venezuela').show();
	});
	
	$('#img_country_0' ).click(function() {
		$('#country_0').attr('checked', true).change();
		$('#pay-box').show();
		$('#pay-box-venezuela').hide();
	});
	
	
	
	$('#img_plan_1' ).click(function() {
		$('#plan').val('0');
		$('#img_plan_1').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_gratis_color.png');
		$('#img_plan_2').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_1_mes_gris.png');
		$('#img_plan_3').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_6_meses_gris.png');
		$('#img_plan_4').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_1_anio_gris.png');
		$('#img_plan_5').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_2_anios_gris.png');
		
		$('#pay-box').load('index.php?option=com_thorhospedaje&task=posaderos.pagoAjax&id_country='+$('input[name=country]:checked').val()+'&id_plan='+$('#plan').val(),function(){});
	});
	
	$('#img_plan_2' ).click(function() {
		$('#plan').val('1');
		$('#img_plan_1').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_gratis_gris.png');
		$('#img_plan_2').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_1_mes_color.png');
		$('#img_plan_3').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_6_meses_gris.png');
		$('#img_plan_4').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_1_anio_gris.png');
		$('#img_plan_5').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_2_anios_gris.png');
		$('#pay-box').load('index.php?option=com_thorhospedaje&task=posaderos.pagoAjax&id_country='+$('input[name=country]:checked').val()+'&id_plan='+$('#plan').val(),function(){});
	});
	
	$('#img_plan_3' ).click(function() {
		$('#plan').val('2');
		$('#img_plan_1').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_gratis_gris.png');
		$('#img_plan_2').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_1_mes_gris.png');
		$('#img_plan_3').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_6_meses_color.png');
		$('#img_plan_4').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_1_anio_gris.png');
		$('#img_plan_5').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_2_anios_gris.png');
		$('#pay-box').load('index.php?option=com_thorhospedaje&task=posaderos.pagoAjax&id_country='+$('input[name=country]:checked').val()+'&id_plan='+$('#plan').val(),function(){});
	});
	
	$('#img_plan_4' ).click(function() {
		$('#plan').val('3');
		$('#img_plan_1').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_gratis_gris.png');
		$('#img_plan_2').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_1_mes_gris.png');
		$('#img_plan_3').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_6_meses_gris.png');
		$('#img_plan_4').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_1_anio_color.png');
		$('#img_plan_5').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_2_anios_gris.png');
		$('#pay-box').load('index.php?option=com_thorhospedaje&task=posaderos.pagoAjax&id_country='+$('input[name=country]:checked').val()+'&id_plan='+$('#plan').val(),function(){});
	});
	
	$('#img_plan_5' ).click(function() {
		$('#plan').val('4');
		$('#img_plan_1').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_gratis_gris.png');
		$('#img_plan_2').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_1_mes_gris.png');
		$('#img_plan_3').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_6_meses_gris.png');
		$('#img_plan_4').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_1_anio_gris.png');
		$('#img_plan_5').attr('src','" . JURI::base() . "/media/com_thorhospedaje/images/posaderos/cupon_2_anios_color.png');
		$('#pay-box').load('index.php?option=com_thorhospedaje&task=posaderos.pagoAjax&id_country='+$('input[name=country]:checked').val()+'&id_plan='+$('#plan').val(),function(){});
	});
});
");
?>
<div class="mod_th_posadero">
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
		<img src="media/com_thorhospedaje/images/posaderos/ruta_pago.png" />
	</div>


<h2><?php echo JText::_('TH_POSADERO_PAY_MESSAGE_TITLE'); ?></h2>

<form name="pay-form" id="pay-form" action="<?php echo JRoute::_("");?>" method="POST" class="form-inline">


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
		<a href="index.php?option=com_thorhospedaje&view=posaderos" target="_self">
			<img style="width:60%; float: left;" src="media/com_thorhospedaje/images/comunes/atras.png" width="60%"/>
		</a>
	</div>
	<div class="span6">
		<a href="index.php?option=com_thorhospedaje&view=posaderos&layout=success" target="_self">
			<img style="width:60%; float: right;" src="media/com_thorhospedaje/images/comunes/pagar.png" width="60%"/>
		</a>
	</div>
</div>
</form>
</div>
</div>
