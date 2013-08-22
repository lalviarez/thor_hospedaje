<?php

/**
 * @version		$Id: view.html.php 2013-08-16
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');


// import Joomla view library
jimport('joomla.application.component.view');

/**
 * State View
 */
class ThorHospedajeViewAsset extends JViewLegacy
{
	
	protected $state;

	protected $item;
	
	protected $params;

	/**
	 * State view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		$app = JFactory::getApplication();
		
		// Get data from the model
		$this->item		= $this->get('Item');
		$this->state	= $this->get('State');
		//$this->params = JComponentHelper::getParams('com_thorhospedaje');

		if ($this->item)
		{
			// If we found an item, merge the item parameters
			//$this->params->merge($this->item->params);
			//$this->params = $this->item->params;
			
			// Get States Model data
			$roomsModel = JModelLegacy::getInstance('Rooms', 'ThorHospedajeModel', array('ignore_request' => true));
			$roomsModel->setState('list.select', 'a.*');
		
			// Filter by state of publicated
			$roomsModel->setState('filter.state', 1);

			// Filter by language
			$roomsModel->setState('filter.language', $app->getLanguageFilter());
			
			// Filter by State
			$th_asset_id = $this->item->id;
			$roomsModel->setState('filter.th_asset_id', $th_asset_id);
			
			// Ordering
			$roomsModel->setState('list.ordering', 'ordering');
			$roomsModel->setState('list.direction','asc');
			
			// Set the limits for pagination
			$limitstart = $app->input->get('limitstart', 0, 'uint');
			$roomsModel->setState('list.start', $limitstart);
			
			// Se calculan los elementos a traer en cada consulta
			//$countItems = ((int) $this->params->get('state-rowcount', 2)) * ((int) $this->params->get('state-rowcount', 2));
			$countItems = 5;
			$roomsModel->setState('list.limit', $countItems);

			$this->item->rooms = $roomsModel->getItems();
			$this->pagination = $roomsModel->getPagination();
		}
		
        // Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		// Display the template
		parent::display($tpl);
	}
}
