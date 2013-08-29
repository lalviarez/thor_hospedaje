<?php
/**
 * @version		$Id: view.html.php 2013-07-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note			Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('bootstrap.tooltip');

$input     = JFactory::getApplication()->input;
$function  = $input->getCmd('function', 'jSelectCountry');
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>

<form action="<?php echo JRoute::_('index.php?option=com_thorhospedaje&view=countries&layout=modal&tmpl=component&function='.$function);?>" method="post" name="adminForm" id="adminForm" class="form-inline">
<div id="filter-bar" class="btn-toolbar">
	<div class="btn-group pull-left">
		<label for="filter_search">
			<?php echo JText::_('JSEARCH_FILTER_LABEL'); ?>
		</label>
	</div>
	<div class="btn-group pull-left">
		<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" size="30" title="<?php echo JText::_('TH_COUNTRIES_FILTER_SEARCH_DESC'); ?>" />
	</div>
	<div class="btn-group pull-left">
		<button type="submit" class="btn hasTooltip" data-placement="bottom" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>">
			<span class="icon-search"></span><?php echo '&#160;' . JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
		<button type="button" class="btn hasTooltip" data-placement="bottom" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.id('filter_search').value='';this.form.submit();">
			<span class="icon-remove"></span><?php echo '&#160;' . JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
	</div>
	<div class="btn-group pull-right hidden-phone">
		<label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
		<?php echo $this->pagination->getLimitBox(); ?>
	</div>
<div class="clearfix"></div>
</div>	


<hr class="hr-condensed" />

<div class="filters pull-left">
	<select name="filter_access" class="input-medium" onchange="this.form.submit()">
		<option value=""><?php echo JText::_('JOPTION_SELECT_ACCESS');?></option>
		<?php echo JHtml::_('select.options', JHtml::_('access.assetgroups'), 'value', 'text', $this->state->get('filter.access'));?>
	</select>
	<select name="filter_language" class="input-medium" onchange="this.form.submit()">
		<option value=""><?php echo JText::_('JOPTION_SELECT_LANGUAGE');?></option>
		<?php echo JHtml::_('select.options', JHtml::_('contentlanguage.existing', true, true), 'value', 'text', $this->state->get('filter.language'));?>
	</select>
</div>
<table class="table table-striped table-condensed">
			<thead>
				<tr> 	
					<th class="title">
						<?php echo JHtml::_('grid.sort','TH_COUNTRIES_HEADING_COUNTRY','a.country',$listDirn, $listOrder); ?>
					</th>
					<th width="5%" class="center nowrap">
						<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ACCESS', 'a.access',$listDirn, $listOrder); ?>
					</th>
					<th width="5%" class="center nowrap">
						<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_LANGUAGE', 'a.language',$listDirn, $listOrder); ?>
					</th>
					<th width="1%" class="center nowrap">
						<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'a.id',$listDirn, $listOrder); ?>
					</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="7">
						<?php echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
			<tbody>
			<?php foreach($this->items as $i => $item):
			?>
			<tr class="row<?php echo $i % 2; ?>">
				<td>
					<a class="pointer" onclick="if (window.parent) window.parent.<?php echo $this->escape($function);?>('<?php echo $item->id; ?>', '<?php echo $this->escape(addslashes($item->country)); ?>');" title="<?php echo $this->escape($item->country); ?>">
					<?php echo $this->escape(str_replace(JURI::root(), '', $item->country)); ?></a>
					<?php /*echo $item->greeting;*/ ?> 
				</td>
				<td class="center">
						<?php echo $this->escape($item->access_level); ?>
				</td>
				<td class="center">
						<?php if ($item->language == '*'):?>
							<?php echo JText::alt('JALL', 'language'); ?>
						<?php else:?>
							<?php echo $item->language_title ? $this->escape($item->language_title) : JText::_('JUNDEFINED'); ?>
						<?php endif;?>
				</td>
				<td>
					<?php echo $item->id; ?>
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" /> 
		<?php echo JHtml::_('form.token'); ?>
		
		
	</div>
</form>
