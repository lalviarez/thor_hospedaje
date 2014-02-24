<?php
/**
 * @version		$Id: default_contact.php 2013-08-16
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;
$document = JFactory::getDocument();
$document->addScript('http://maps.google.com/maps/api/js?sensor=false');
$document->addScript('media/com_thorhospedaje/js/jquery.gmap.js');
$latitude=$this->item->params->get('asset-latitude','');
$longitude=$this->item->params->get('asset-longitude','');

$document->addScriptDeclaration("
jQuery(document).ready(function() {
	        jQuery('#map').gMap({ markers: [{
                               latitude: ".$latitude.", 
                               longitude: ".$longitude.",
                               html: 'Estación del Norte'
                             }], 
                   			zoom: 13,
                  
  							});
			});
");

?>
	<div class="row-fluid">
		<h3><?php echo JText::_('TH_ASSET_FIELD_CONTACS_LABEL'); ?></h3>
		<div style="background-color: transparent; height: 5px; background-image: linear-gradient(to right, #FFCC00 100%, rgba(2, 255, 255, 0) 100%); margin: 0% 0px 3% 0%;"></div>
		<div class="span3" style="background-color: white; padding: 1%; border-radius: 10px; border: 1px solid #FFCC00">
			<address>
				<dl>
					<dt><?php echo JText::_('TH_ASSET_FIELD_COUNTRY_LABEL'); ?>:</dt>
					<dd><?php echo $this->item->country->country;?></dd>
					<dt><?php echo JText::_('TH_ASSET_FIELD_STATE_LABEL'); ?>:</dt>
					<dd><?php echo $this->item->state->state_name;?></dd>
					<dt><?php echo JText::_('TH_ASSET_FIELD_ADDRESS_LABEL'); ?>:</dt>
					<dd><?php echo $this->item->contact_data->get('asset-address','');?></dd>
					<dt><?php echo JText::_('TH_ASSET_FIELD_PHONE_LABEL'); ?>:</dt>
					<dd><?php echo $this->item->contact_data->get('asset-phone','');?></dd>
					<!-- <dt><?php echo JText::_('TH_ASSET_FIELD_EMAIL_LABEL'); ?>:</dt>
					<dd><?php echo $this->item->contact_data->get('asset-email','');?></dd>				 -->
				</dl>
			</address>
			<span class="social">
				<?php if ($this->item->contact_data->get('asset-email','') != ''):
				?>
				<a href="mailto:<?php echo $this->item->contact_data->get('asset-email','');?>">
					<img src="media/com_thorhospedaje/images/email.png" alt="" />
				</a>
				<?php 
				endif;
				?>
				<?php if ($this->item->contact_data->get('asset-facebook','') != ''):
				?>
				<a target="_blank" href="<?php echo $this->item->contact_data->get('asset-facebook','');?>">
					<img src="media/com_thorhospedaje/images/facebook.png" alt="" />
				</a>
				<?php 
				endif;
				?>
				<?php if ($this->item->contact_data->get('asset-twitter','') != ''):
				?>
				<a target="_blank" href="<?php echo $this->item->contact_data->get('asset-twitter','');?>">
					<img src="media/com_thorhospedaje/images/twitter.png" alt="" />
				</a>
				<?php 
				endif;
				?>
			</span>
		</div>
		<div class="span4">
			<div id="map" style="width: 100%; height: 300px; border: 1px solid #777; 
			overflow: hidden; margin: 0 auto;">
			</div>
		</div>
	</div>



