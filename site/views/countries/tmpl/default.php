<?php
/**
 * @version		$Id: default.php 2013-07-11
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
$document->addStyleSheet('media/com_thor_hospedaje/css/th_countries.css');
$document->addScript('media/com_thor_hospedaje/js/jquery.ThreeDots.min.js');
$document->addScriptDeclaration('
jQuery(document).ready(function(){
    jQuery(window).on("resize", function () {

    var w = jQuery("[id^=th-country-image]").outerWidth(true);
    var h = jQuery("[id^=th-country-image]").outerHeight(true);
    
    jQuery("[id^=th-country-text]").height(h);

	}).resize();
    
	jQuery(".ellipsis").ThreeDots();
}); 
');

// LJAH: Estos parámetros deben ser sustituidos con parámetros pasados por usuario
$rowCount = 2;
$itemRow = 2;
$itemWidth = 47;
?>
<?php /* Falta agregar y probar el uso de la clase que el usuario pasa por parametro */ ?>
<div class="mod_th_countries">
	<?php
	$count = 0;
	for ($i = $count;  $i < count($this->items); $i++):
		if (isset($this->items[$count])): 
	?>		<div class="row-fluid">
			<?php
			for ($j = 0; $j < $itemRow; $j++):
				if (isset($this->items[$count])):
					$item = $this->items[$count];
			?>

			<a href="index.php?option=com_thorhospedaje&view=country&id_country=<?php echo $item->id; ?>">

			<div class="country-item" style="width: <?php echo $itemWidth; ?>%;">
				<div id="th-country-image-<?php echo $count;?>" class="country-image">
					<img src="<?php echo $item->image?>">
				</div>
				<div id="th-country-text-<?php echo $count;?>" class="country-text">
					<h1><?php echo $item->country; ?></h1>
					<div class="ellipsis"><span class="ellipsis_text"><?php echo $item->country_desc; ?></span></div>
				</div>
			</div>
			</a>
			<?php
					$count++;
				endif;
			endfor;
			?>
			</div>
		<?php
		endif;
		?>
	<?php 
	endfor; 
	?>
</div>
<?php echo $this->pagination->getListFooter(); ?>



