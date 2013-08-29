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
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.chosen', 'select');

$user		= JFactory::getUser();
$userId		= $user->get('id');
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
//$params		= (isset($this->state->params)) ? $this->state->params : new JObject;
$saveOrder	= $listOrder == 'ordering';

if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_thorhospedaje&task=countries.saveOrderAjax&tmpl=component';
	JHtml::_('sortablelist.sortable', 'countryList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
}

//$sortFields = $this->getSortFields();

?>
<script type="text/javascript">
	/*Joomla.orderTable = function()
	{
		table = document.getElementById("sortTable");
		direction = document.getElementById("directionTable");
		order = table.options[table.selectedIndex].value;
		if (order != '<?php echo $listOrder; ?>')
		{
			dirn = 'asc';
		}
		else
		{
			dirn = direction.options[direction.selectedIndex].value;
		}
		Joomla.tableOrdering(order, dirn, '');
	}*/
</script>
<form action="<?php echo JRoute::_('index.php?option=com_thorhospedaje&view=countries'); ?>" method="post" name="adminForm" id="adminForm">
<?php if (!empty( $this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>

<div id="filter-bar" class="btn-toolbar">
	<div class="filter-search btn-group pull-left">
		<label for="filter_search" class="element-invisible"><?php echo JText::_('TH_COUNTRIES_FILTER_SEARCH_DESC'); ?></label>
		<input type="text" name="filter_search" placeholder="<?php echo JText::_('TH_COUNTRIES_FILTER_SEARCH_DESC'); ?>" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('COM_CONTENT_FILTER_SEARCH_DESC'); ?>" />
	</div>
	<div class="btn-group pull-left hidden-phone">
		<button class="btn tip hasTooltip" type="submit" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
		<button class="btn tip hasTooltip" type="button" onclick="document.id('filter_search').value='';this.form.submit();" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>"><i class="icon-remove"></i></button>
	</div>
	<div class="btn-group pull-right hidden-phone">
		<label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
		<?php echo $this->pagination->getLimitBox(); ?>
	</div>
	<div class="btn-group pull-right hidden-phone">	
		<select name="filter_language" class="input-medium" onchange="this.form.submit()">
			<option value=""><?php echo JText::_('JOPTION_SELECT_LANGUAGE');?></option>
			<?php echo JHtml::_('select.options', JHtml::_('contentlanguage.existing', true, true), 'value', 'text', $this->state->get('filter.language'));?>
		</select>
	</div>
	<div class="btn-group pull-right hidden-phone">
		<select name="filter_access" class="input-medium" onchange="this.form.submit()">
			<option value=""><?php echo JText::_('JOPTION_SELECT_ACCESS');?></option>
			<?php echo JHtml::_('select.options', JHtml::_('access.assetgroups'), 'value', 'text', $this->state->get('filter.access'));?>
		</select>
	</div>
	<div class="btn-group pull-right hidden-phone">
		<select name="filter_published" class="input-medium" onchange="this.form.submit()">
				<option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
				<?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true);?>
			</select>
	</div>
</div>		
<div class="clearfix"> </div>

<table class="table table-striped" id="countryList">
			<thead>
				<tr> 
				    <th width="1%" class="nowrap center hidden-phone">
						<?php echo JHtml::_('grid.sort', '<i class="icon-menu-2"></i>', 'ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING'); ?>
					</th>	

					<th>
						<input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
					</th>
					<th>
						<?php echo JHtml::_('grid.sort','TH_COUNTRIES_HEADING_COUNTRY','a.country',$listDirn, $listOrder); ?>
					</th>

					<th width="1%" style="min-width:55px" class="nowrap center">
						<?php echo JHtml::_('grid.sort', 'JSTATUS', 'a.state',$listDirn, $listOrder); ?>
					</th>
					<th width="5%" class="nowrap hidden-phone">
						<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ACCESS', 'a.access',$listDirn, $listOrder); ?>
					</th>
					<th width="5%" class="nowrap hidden-phone">
						<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_LANGUAGE', 'a.language',$listDirn, $listOrder); ?>
					</th>
					<th width="1%" class="nowrap center">
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
			$ordering  = ($listOrder == 'ordering');
			?>
			<tr class="row<?php echo $i % 2; ?>">
                <td class="order nowrap center hidden-phone">
					<?php //if ($canChange) :
						$disableClassName = '';
						$disabledLabel	  = '';
						if (!$saveOrder) :
							$disabledLabel    = JText::_('JORDERINGDISABLED');
							$disableClassName = 'inactive tip-top';
						endif; ?>
						<span class="sortable-handler hasTooltip <?php echo $disableClassName?>" title="<?php echo $disabledLabel?>">
							<i class="icon-menu"></i>
						</span>
						<input type="text" style="display:none" name="order[]" size="5"
							value="<?php echo $item->ordering;?>" class="width-20 text-area-order " />
					<?php /*else : */?>
						<!--<span class="sortable-handler inactive" >
							<i class="icon-menu"></i>
						</span>-->
					<?php /*endif;*/ ?>
				</td>     			
				<td>
					<?php echo JHtml::_('grid.id', $i, $item->id); ?>
				</td>
				<td>
					<a href="<?php echo JRoute::_('index.php?option=com_thorhospedaje&task=country.edit&id='.$item->id);?>" title="<?php echo $this->escape($item->country); ?>">
					<?php echo $this->escape(str_replace(JURI::root(), '', $item->country)); ?></a>
					<?php /*echo $item->greeting;*/ ?> 
				</td>
				<td class="center">
					<?php echo JHtml::_('jgrid.published', $item->state, $i, 'countries.');
					/*, $canChange, 'cb', $item->publish_up, $item->publish_down*/ ?>
					
				</td>
				<td class="small hidden-phone">
						<?php echo $this->escape($item->access_level); ?>
				</td>
				<td class="small nowrap hidden-phone">
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
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" /> 
		<?php echo JHtml::_('form.token'); ?>
		
		
	</div>
</form>
