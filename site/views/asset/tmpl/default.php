<?php
/**
 * @version		$Id: default.php 2013-08-16
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');
JHtml::_('behavior.framework');
JHtml::_('bootstrap.framework');
$document = JFactory::getDocument();
/*
$document->addStyleSheet('media/com_thorhospedaje/css/th_assets.css');
$document->addScript('media/com_thorhospedaje/js/jquery.ThreeDots.min.js');
$document->addScriptDeclaration('
jQuery(document).ready(function(){
    jQuery(window).on("resize", function () {

    var w = jQuery("[id^=th-asset-image]").outerWidth(true);
    var h = jQuery("[id^=th-asset-image]").outerHeight(true);
    
    jQuery("[id^=th-asset-text]").height(h);

	}).resize();
    
	jQuery(".ellipsis").ThreeDots();
}); 
');*/

/*
$rowCount = (int) $this->params->get('state-rowcount', 2);
$itemRow = (int) $this->params->get('state-itemrow', 2);;
$itemWidth = (int) $this->params->get('state-itemwidth', 47);
$itemMenu = (int) $this->params->get('state-itemMenu', 0);*/
?>

<?php /* Falta agregar y probar el uso de la clase que el usuario pasa por parametro */ ?>
<div>
<p>Hola Mundo!</p>
</div>
<?php //echo $this->pagination->getListFooter(); ?>



