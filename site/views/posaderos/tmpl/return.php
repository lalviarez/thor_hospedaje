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
$app =& JFactory::getApplication();
jimport('cielo_thorhospedaje.cielo.cielo');

	$Pago = new THCielo();
	$Pago->FromString($app->getUserState('thorhospedaje.posaderos.pago', NULL));
   /* $Prueba = $app->getUserState('thorhospedaje.posaderos.pago', "Hola");
    print_r($Pago);
    print_r($Prueba);
    exit(1);*/
    // Consulta situação da transação
	$objResposta = $Pago->RequisicaoConsulta();
	
	// Atualiza status
	$Pago->status = $objResposta->status;
	
	if($Pago->status == '4' || $Pago->status == '6')
		$finalizacao = true;
	else
		$finalizacao = false;

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
		<!-- <h1>Retornando...</h1>	 -->
	</div>
	<?php
	if ($finalizacao)
	{
		$html = '<script type="text/javascript">
				window.location.href = "/home-espaniol-venezuela/pago-exito-posadero-espanol"
			 </script>';
	}
	else
	{
		$html = '<script type="text/javascript">
				window.location.href = "/home-espaniol-venezuela/pago-fallo-posadero-espanol"
			 </script>';
		
	}
	echo $html;
	?>
	
</div>
</div>
