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
$document->addStyleSheet('media/com_thorhospedaje/css/th_countries.css');
$document->addScript('media/com_thorhospedaje/js/jquery.ThreeDots.min.js');
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

$rowCount = (int) $this->params->get('countries-rowcount', 2);
$itemRow = (int) $this->params->get('countries-itemrow', 2);;
$itemWidth = (float) $this->params->get('countries-itemwidth', 47);
?>
<?php /* Falta agregar y probar el uso de la clase que el usuario pasa por parametro */ ?>
<div class="mod_th_countries">
	<h1><?php echo JText::_('TH_POSADERO_COUNTRIES_ESCOJA_TITLE'); ?></h1>
	<div class="hr"></div>
	<?php
	$count = 0;
	for ($i = $count;  $i < count($this->items); $i++):
		if (isset($this->items[$count])): 
	?>		<div class="row-fluid">
			<?php
			for ($j = 0; $j < $itemRow; $j++):
				if (isset($this->items[$count])):
					$item = $this->items[$count];
					$Itemid = $item->params->get('country-itemMenu',0);
			?>
					<?php 
					if ($Itemid): 
					?>
						<a href="<?php echo JRoute::_('index.php?view=country&id='. $item->id .'&Itemid='. $Itemid);?>">
					<?php
					else:
					?>
						<a href="<?php echo JRoute::_('index.php?view=country&id='. $item->id);?>">
					<?php
					endif;
					?>
					
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
	<br />
	<div class="hr"></div>
</div>

<?php echo $this->pagination->getListFooter(); ?>



