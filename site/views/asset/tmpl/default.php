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

$document->addStyleSheet('media/com_thorhospedaje/css/th_asset.css');
//$document->addStyleSheet('media/com_thorhospedaje/css/basic.css');
$document->addStyleSheet('media/com_thorhospedaje/css/galleriffic.css');
$document->addScript('media/com_thorhospedaje/js/jquery.galleriffic.js');
$document->addScript('media/com_thorhospedaje/js/jquery.opacityrollover.js');

$document->addScriptDeclaration("
jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				/*$('div.navigation').css({'width' : '300px', 'float' : 'right'});*/
				$('div.navigation').css({'float' : 'right'});
				/*$('div.content').css('display', 'block');*/

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 15,
					preloadAhead:              10,
					enableTopPager:            false,
					enableBottomPager:         false,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          false,
					renderNavControls:         false,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             false,
					autoStart:                 false,
					syncTransitions:           false,
					defaultTransitionDuration: 1800,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});
			});
");

if (isset($this->item->rooms) && ($this->item->rooms))
{
	$countRooms = count($this->item->rooms);
	$script = "jQuery(document).ready(function($) {\n";
	for ($i=0; $i < $countRooms; $i++)
	{
		$script .= sprintf("$('#more_%s').click(function(e){\n
					e.preventDefault();\n
					if ($('#room_desc_%s').css('display') == 'none')\n
					{\n
						$('#room_desc_%s').css('display','block');\n
					}\n
					else\n
					{\n
						$('#room_desc_%s').css('display','none');\n
					}\n
				});\n",$i,$i,$i,$i);
	}
	$script .= "});";
}
$document->addScriptDeclaration($script);
/*
$document->addScriptDeclaration("
jQuery(document).ready(function($) {
				$('#more_1').click(function(e){
					e.preventDefault();
					if ($('#room_desc_1').css('display') == 'none')
					{
						$('#room_desc_1').css('display','block');
					}
					else
					{
						$('#room_desc_1').css('display','none');
					}
				});
			});
");*/

/*
$rowCount = (int) $this->params->get('state-rowcount', 2);
$itemRow = (int) $this->params->get('state-itemrow', 2);;
$itemWidth = (int) $this->params->get('state-itemwidth', 47);
$itemMenu = (int) $this->params->get('state-itemMenu', 0);*/
$assetImages[] = $this->item->image;
$assetImages[] = $this->item->image1;
$assetImages[] = $this->item->image2;
$assetImages[] = $this->item->image3;
$assetImages[] = $this->item->image4;
$assetImages[] = $this->item->image5;
$assetImages[] = $this->item->image6;
$assetImages[] = $this->item->image7;
$assetImages[] = $this->item->image8;
$assetImages[] = $this->item->image9;

?>

<?php /* Falta agregar y probar el uso de la clase que el usuario pasa por parametro */ ?>
<div class="mod_th_asset">
	<h1><?php echo $this->item->asset_name; ?></h1>
	<hr />
	<div class="row-fluid">
		<div id="gallery" class="content span8">
			<!-- <div id="controls" class="controls"></div> -->
			<div class="slideshow-container">
				 <div id="loading" class="loader"></div>
				 <div id="slideshow" class="slideshow">
				 </div>
			</div>
			<!-- <div id="caption" class="caption-container"></div> -->
		</div>
		

		<div id="thumbs" class="navigation span4">
				<ul class="thumbs noscript">
				<?php
				foreach($assetImages as $i => $image):
				?>	
					<li>
						<a class="thumb" name="leaf" href="<?php echo $image;?>" title="">
							<img src="<?php echo $image;?>" alt="" />
						</a>
						<div class="caption">
							<div class="download">
								<a href="http://farm4.static.flickr.com/3261/2538183196_8baf9a8015_b.jpg">Download Original</a>
							</div>
							<div class="image-title">Title #0</div>
							<div class="image-desc">Description</div> 
						</div>
					</li>
				<?php
				endforeach;
				?>					
				</ul>
		</div>
	</div>
	<div class="row-fluid">
		<h3><?php echo JText::_('TH_ASSET_FIELD_CONTACS_LABEL'); ?></h3>
		<hr />
		<div class="span2">
			<address>
				<dl>
					<dt><?php echo JText::_('TH_ASSET_FIELD_COUNTRY_LABEL'); ?>:</dt>
					<dd><?php echo $this->item->country->country;?></dd>
					<dt><?php echo JText::_('TH_ASSET_FIELD_STATE_LABEL'); ?>:</dt>
					<dd><?php echo $this->item->state->state_name;?></dd>
					<dt><?php echo JText::_('TH_ASSET_FIELD_ADDRESS_LABEL'); ?>:</dt>
					<dd>Acá va la información</dd>
					<dt><?php echo JText::_('TH_ASSET_FIELD_PHONE_LABEL'); ?>:</dt>
					<dd>Acá va la información</dd>
					<dt><?php echo JText::_('TH_ASSET_FIELD_EMAIL_LABEL'); ?>:</dt>
					<dd>Acá va la información</dd>				
				</dl>
			</address>
		</div>
	</div>
	<div class="row-fluid">
		<h3><?php echo JText::_('TH_ASSET_FIELD_DESCRIPTION_LABEL'); ?></h3>
		<hr />
		<p><?php echo $this->item->asset_desc;?></p>
	</div>
	<div class="row-fluid rooms">
		<h3><?php echo JText::_('TH_ASSET_FIELD_ROOMS_LABEL'); ?></h3>
		<hr />
		<?php
		if (isset($this->item->rooms) && ($this->item->rooms)):
			foreach($this->item->rooms as $i => $room):
				($i%2 === 0) ? $class = "even" : $class = "odd";
		?>
		<div class="row-fluid room <?php echo $class; ?>">
			<div class="span1"> </div>
			<div class="span2">
				<h4><?php echo $room->room_name;?></h4>
			</div>
			<div class="span3">
				<ul>
					<li><strong>Nº de adultos:&nbsp; </strong><?php echo $room->number_adult;?></li>
					<li><strong>Nº de niños:&nbsp; </strong><?php echo $room->number_children;?></li>
				</ul>
				<a href="javascript:;" id="more_<?php echo $i;?>">Ver más</a>
			</div>
			<div class="span3" style="text-align:center;">
				<span class="cost"><?php echo $room->room_cost;?></span>
			</div>
			<div class="span12 description" id="room_desc_<?php echo $i;?>">
				<?php echo $room->room_desc;?>
			</div>
		</div>
		<?php
			endforeach;
		endif;
		?>
	</div>
	
</div> <!-- mod_th_asset -->
<?php echo $this->pagination->getListFooter(); ?>



