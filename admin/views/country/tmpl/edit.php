<?php
/**
 * @version		$Id: edit.php 2013-07-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'country.cancel' || document.formvalidator.isValid(document.id('country-form')))
		{
			Joomla.submitform(task, document.getElementById('country-form'));
		}
	}
</script>
<form action="<?php echo JRoute::_('index.php?option=com_thorhospedaje&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="country-form" class="form-validate form-horizontal">
	<div class="row-fluid">
		<!-- Begin country -->
		<div class="span10 form-horizontal">
	<fieldset>
		<ul class="nav nav-tabs">
			<li class="active"><a href="#details" data-toggle="tab"><?php echo empty($this->item->id) ? JText::_('TH_COUNTRY_NEW_COUNTRY') : JText::sprintf('TH_COUNTRY_EDIT_COUNTRY', $this->item->id); ?></a></li>
			<li><a href="#publishing" data-toggle="tab"><?php echo JText::_('JGLOBAL_FIELDSET_PUBLISHING');?></a></li>
			<?php
			$fieldSets = $this->form->getFieldsets('params');
			foreach ($fieldSets as $name => $fieldSet) :
			?>
			<li><a href="#params-<?php echo $name;?>" data-toggle="tab"><?php echo JText::_($fieldSet->label);?></a></li>
			<?php endforeach; ?>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="details">
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('country'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('country'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('country_desc'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('country_desc'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('image'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('image'); ?></div>
				</div>
			</div>
			
			<div class="tab-pane" id="publishing">
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('id'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('created_by'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('created_by'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('created_date'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('created_date'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('modified_by'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('modified_by'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('modified_date'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('modified_date'); ?></div>
				</div>
			</div>
				<?php echo $this->loadTemplate('params'); ?>
				
				<input type="hidden" name="task" value="country.edit" />
				<?php echo JHtml::_('form.token'); ?>
		</div>
	    </div>
	<!-- End country -->
	<!-- Begin Sidebar -->
		<div class="span2">
			<h4><?php echo JText::_('JDETAILS');?></h4>
			<hr />
			<fieldset class="form-vertical">
				<div class="control-group">
					<div class="controls">
						<?php echo $this->form->getValue('title'); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('state'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('state'); ?>
					</div>
				</div>

				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('access'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('access'); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('language'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('language'); ?>
					</div>
				</div>
			</fieldset>
		</div>
		<!-- End Sidebar -->
</form>

