<?php

/**
 * @version		$Id: view.html.php 2013-07-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Availability rooms View
 */
class ThorHospedajeViewReservation extends JViewLegacy
{
	protected $state;
	
	protected $item;

	protected $pagination;
	
	protected $params;
	
	protected $countries;

	/**
	 * Availability rooms view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		$app = JFactory::getApplication('site');
		$this->params = JComponentHelper::getParams('com_thorhospedaje');
		/*$this->item = new stdClass();
		$this->item->country_name = $app->input->get('country_name', NULL);
		$this->item->state_name = $app->input->get('state_name', NULL);
		$this->item->asset_name = $app->input->get('th_asset_name', NULL);
		$this->item->checkin = $app->input->get('checkin', NULL);
		$this->item->checkout = $app->input->get('checkout', NULL);*/
		;

		/* 
		 * Get AvailabilityRooms Model data
		 * */
		$roomsModel = JModelLegacy::getInstance('AvailabilityRooms', 'ThorHospedajeModel', array('ignore_request' => true));
		$roomsModel->setState('list.select', 'a.*');
	
		
		// Filter by state of publicated
		$roomsModel->setState('params', $this->params);
		
		// Filter by state of publicated
		$roomsModel->setState('filter.state', 1);

		// Filter by language
		$roomsModel->setState('filter.language', $app->getLanguageFilter());
		
		// Filter by Country
		$country_id = $app->input->get('country_id', NULL);
		$roomsModel->setState('country_id', $country_id);
		
		// Filter by State
		$state_id = $app->input->get('state_id', NULL);
		$roomsModel->setState('state_id', $state_id);
		
		// Filter by asset
		$th_asset_id = $app->input->get('th_asset_id', NULL);
		$roomsModel->setState('th_asset_id', $th_asset_id);
		
		// Filtrando por fecha de entrada
		$roomsModel->setState('checkin', $app->input->get('checkin', NULL));
		
		// Filtrando por fecha de salida
		$roomsModel->setState('checkout', $app->input->get('checkout', NULL));
		
		// Filtrando por cantidad de adultos
		$roomsModel->setState('n_adults', $app->input->get('n_adults', NULL));
		
		// Filtrando por cantidad de niños
		$roomsModel->setState('n_childrens', $app->input->get('n_childrens', NULL));
		
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
		
		$asset_rooms = $roomsModel->getItems();
		if (isset($asset_rooms[0]->rooms_types) && ($asset_rooms[0]->rooms_types))
		{
			$this->item = $asset_rooms[0];
		}
		$this->item->checkin = $app->input->get('checkin', NULL);
		$this->item->checkout = $app->input->get('checkout', NULL);
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
