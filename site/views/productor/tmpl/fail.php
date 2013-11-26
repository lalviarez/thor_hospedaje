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
		<img src="media/com_thorhospedaje/images/productor/ruta_completado.png" />
	</div>
	<div class="row-fluid" style="margin-top: 11%;">
		<img src="media/com_thorhospedaje/images/posaderos/no_completado.png" />
	</div>

<h2><?php echo JText::_('TH_POSADERO_FAIL_MESSAGE_TITLE'); ?></h2>

<div class="row-fluid" style="margin-top: 5%;">
		<a href="index.php?option=com_thorhospedaje&view=productor&layout=pay" target="_self">
			<img style=" display: block; margin: 0 auto 0 auto; width:25%; " src="media/com_thorhospedaje/images/comunes/atras.png"/>
		</a>
</div>

</div>
</div>
