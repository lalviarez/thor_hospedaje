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
</div>

<div class="span9">
	<br><br>
	<div class="row-fluid">
		<img src="media/com_thorhospedaje/images/posaderos/ruta_posadero.png" />
	</div>


<h2><?php echo JText::_('TH_POSADERO_MESSAGE_TITLE'); ?></h2>
<p><?php echo JText::_('TH_POSADERO_MESSAGE_P1'); ?></p>
<p><?php echo JText::_('TH_POSADERO_MESSAGE_P2'); ?></p>

<form action="<?php echo JRoute::_("");?>" method="POST" class="form-inline">




<div class="row-fluid box">
	<h2><?php echo JText::_('TH_POSADERO_TITLE_LANGUAGE'); ?></h2>
	<div class="hr"></div>
	<div class="row-fluid">
	<div class="span6">
	<div class="control-label"><label title="" for="client-language"><?php echo JText::_('TH_POSADERO_CLIENT_LANGUAGE_LABEL'); ?></label></div>
	<div class="controls">
		<div class="input-append">
			<select name="client-language" id="client-language">
				<option value=""><?php echo JText::_('TH_POSADERO_CLIENT_LANGUAGE_SELECT'); ?></option>
				<option value="1"><?php echo JText::_('TH_POSADERO_CLIENT_LANGUAGE_PT'); ?></option>
				<option value="2"><?php echo JText::_('TH_POSADERO_CLIENT_LANGUAGE_EN'); ?></option>
				<option value="3"><?php echo JText::_('TH_POSADERO_CLIENT_LANGUAGE_ES'); ?></option>
			</select>
		</div>
	</div>
	</div>
	<div class="span5">
		<img src="media/com_thorhospedaje/images/posaderos/tip_ayuda_idioma.png" width="100%"/>
	</div>
	</div>
</div>

<!-- Datos de cliente -->
<?php echo $this->loadTemplate('client'); ?>

<!-- Dirección -->
<?php echo $this->loadTemplate('address'); ?>



<!-- Hotel -->
<?php echo $this->loadTemplate('asset'); ?>

<!-- Hotel -->
<?php echo $this->loadTemplate('conditions'); ?>

<div class="row-fluid">
	<div class="span6">
		<a href="index.php/contrate-con-nosotros?id=14" target="_self">
			<img style="width:60%; float: left;" src="media/com_thorhospedaje/images/comunes/atras.png" width="60%"/>
		</a>
	</div>
	<div class="span6">
		<a href="index.php?option=com_thorhospedaje&view=posaderos&layout=pay" target="_self">
			<img style="width:60%; float: right;" src="media/com_thorhospedaje/images/comunes/siguiente.png" width="60%"/>
		</a>
	</div>
</div>
</form>
</div>
</div>
