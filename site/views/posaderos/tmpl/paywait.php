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
?>
<div class="mod_th_posadero">
<div class="span3">
	<br><br><br /><br />
	<img style="width:80%;" src="media/com_thorhospedaje/images/posaderos/te_ofrecemos.png" />
	<br><br><br><br>
	<img style="width:80%;" src="media/com_thorhospedaje/images/posaderos/cielo_aviso.png" />
</div>

<div class="span9">
	<br><br>
	<div class="row-fluid">
		<img src="media/com_thorhospedaje/images/posaderos/ruta_pago.png" />
	</div>
	<div class="row-fluid" style="margin-top: 11%;">
		<h1>Travelbooq lo redigirá a un entorno seguro para realizar su pago. Espere...</h1>
	</div>
    <?php echo sprintf("formaPagamentoBandeira: %s <br />", $_POST['parcelas']);
	?>
	Si es débito o un solo pago <br />
	<?php
	echo sprintf("formaPagamentoProduto: es A o 1 respectivamente <br />");
	echo sprintf("formaPagamentoParcelas: 1 <br />");
    ?>
    Si es crédito y varios pagos <br />
	<?php
	echo sprintf("formaPagamentoProduto: 2 <br />");
	echo sprintf("formaPagamentoParcelas: %s <br />", $_POST['parcelas']);
    ?>
    Resto de datos <br />
    <?php
	echo sprintf("dadosEcNumero:  <br />");
	echo sprintf("dadosEcChave:  <br />");
	echo sprintf("capturar:  <br />");
	echo sprintf("autorizar:  <br />");
	
	echo sprintf("dadosPedidoNumero:  <br />");
	echo sprintf("dadosPedidoValor:  <br />");
	echo sprintf("urlRetorno:  <br />");
    ?>
</div>
</div>
