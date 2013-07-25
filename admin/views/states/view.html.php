<?php

/**
 * @version		$Id: view.html.php 2013-07-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note			Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * States View
 */
class ThorHospedajeViewStates extends JViewLegacy
{
	
	protected $items;

	protected $pagination;
	
	protected $state;
	

	/**
	 * Countries view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');  
		$this->state		= $this->get('State');
        
      
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		JToolBarHelper::title(JText::_('TH_MANAGER_STATES'));
		JToolBarHelper::addNew('state.add');
		JToolBarHelper::editList('state.edit');
		JToolBarHelper::deleteList('','states.delete');		
	}

	/**
	 * Returns an array of fields the table can be sorted by
	 *
	 * @return  array  Array containing the field name to sort by as the key and display text as value
	 *
	 * @since   3.0
	 */
	/*protected function getSortFields()
	{
		return array(
			'ordering' => JText::_('JGRID_HEADING_ORDERING'),
			'a.country' => JText::_('COM_BANNERS_HEADING_NAME'),
			'a.id' => JText::_('JGRID_HEADING_ID')
		);
	}*/

}
