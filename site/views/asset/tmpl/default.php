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
					syncTransitions:           true,
					defaultTransitionDuration: 900,
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


/*
$rowCount = (int) $this->params->get('state-rowcount', 2);
$itemRow = (int) $this->params->get('state-itemrow', 2);;
$itemWidth = (int) $this->params->get('state-itemwidth', 47);
$itemMenu = (int) $this->params->get('state-itemMenu', 0);*/
?>

<?php /* Falta agregar y probar el uso de la clase que el usuario pasa por parametro */ ?>
<div class="mod_th_asset">
	<h2><?php echo $this->item->asset_name; ?></h2>
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
					<li>
						<a class="thumb" name="leaf" href="<?php echo $this->item->image;?>" title="Title #0">
							<img class="mini" src="<?php echo $this->item->image;?>" alt="Title #0" />
						</a>
						<div class="caption">
							<div class="download">
								<a href="http://farm4.static.flickr.com/3261/2538183196_8baf9a8015_b.jpg">Download Original</a>
							</div>
							<div class="image-title">Title #0</div>
							<div class="image-desc">Description</div> 
						</div>
					</li>
				</ul>
		</div>
	</div>
</div>




<!--
<div>
<h2><?php echo $this->item->asset_name; ?></h2>
<div class="row-fluid">
<div style="float: left;">
<p>Acá van las fotografías</p>
<address>Acá va la dirección</address>
<address>Acá va el teléfono</address>
<p>Acá van las redes sociales</p>
</div>
<div style="float: right;">
<p>Acá va el mapa de google</p>
<p>Acá va el clima promedio en la zona</p>
</div>
</div>
<div class="row-fluid">
<h5>Descripción</h5>
<p><?php echo $this->item->asset_desc; ?></p>
</div>
<div class="row-fluid">
<h5>Servicios</h5>
</div>
<div class="row-fluid">
<h5>Tipo de Habitaciones</h5>
</div>
<div class="row-fluid">
<h5>Condiciones de la posada</h5>
</div>
</div>-->
<?php //echo $this->pagination->getListFooter(); ?>



