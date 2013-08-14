<?php
/**
 * @version		$Id: default.php 2013-08-14
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
$document->addStyleSheet('media/com_thor_hospedaje/css/th_states.css');
$document->addScript('media/com_thor_hospedaje/js/jquery.ThreeDots.min.js');
$document->addScriptDeclaration('
jQuery(document).ready(function(){
    jQuery(window).on("resize", function () {

    var w = jQuery("[id^=th-state-image]").outerWidth(true);
    var h = jQuery("[id^=th-state-image]").outerHeight(true);
    
    jQuery("[id^=th-state-text]").height(h);

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
<div class="mod_th_states">
	<div class="row-fluid">
		<p><?php echo nl2br($this->item->country_desc); ?></p>
	</div>
	<?php
	$count = 0;
	$list = $this->item->states;
	for ($i = $count;  $i < count($list); $i++):
		if (isset($list[$count])): 
	?>		<div class="row-fluid">
			<?php
			for ($j = 0; $j < $itemRow; $j++):
				if (isset($list[$count])):
					$item = $list[$count];
			?>

			<a href="<?php echo JRoute::_('index.php?view=state&id='. $item->id);?>">
			<div class="state-item" style="width: <?php echo $itemWidth; ?>%;">
				<div id="th-state-image-<?php echo $count;?>" class="state-image">
					<img src="<?php echo $item->image?>">
				</div>
				<div id="th-state-text-<?php echo $count;?>" class="state-text">
					<h1><?php echo $item->state_name; ?></h1>
					<div class="ellipsis"><span class="ellipsis_text"><?php echo $item->state_desc; ?></span></div>
				</div>
			</div></a>
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



