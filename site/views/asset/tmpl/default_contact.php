<?php
/**
 * @version		$Id: default.php 2013-08-16
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;

?>
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
	</div>



