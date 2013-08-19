<?php

/**
 * @version		$Id: rooms.php 2013-08-12
 * @copyright		Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * Rooms Model
 */
class ThorHospedajeModelRooms extends JModelList
{

	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.id',
				'cid', 'a.cid',
				'asset_name', 'a.asset_name',
         	   		'state_id', 'a.state_id',
         	    		'language', 'a.language',   
         	   		'state', 'a.state',
				'access', 'a.access',
				'ordering', 'a.ordering',
				
			);
		}

		parent::__construct($config);
	}

	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return	string	An SQL query
	 */
	protected function getListQuery() 
	{
		// Create a new query object.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);

		// Select some fields
		$query->select('r.id,r.room_name,r.th_asset_id,r.state,r.access,r.language, r.ordering as ordering');

		// From the states table
		$query->from('#__th_rooms'.' AS r');

		// Join over the asset
		$query->select('a.asset_name');
		$query->join('LEFT', $db->quoteName('#__th_assets').' AS a ON a.id = r.th_asset_id');  

		
       		// Join over the language
		$query->select('l.title AS language_title');
		$query->join('LEFT', $db->quoteName('#__languages').' AS l ON l.lang_code = r.language');  

		// Join over the asset groups.
		$query->select('ag.title AS access_level');
		$query->join('LEFT', '#__viewlevels AS ag ON ag.id = r.access');

		// Filter by access level.
		if ($access = $this->getState('filter.access'))
		{
			$query->where('r.access = '.(int) $access);
		}
		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering', 'ordering');
		$orderDirn	= $this->state->get('list.direction', 'ASC');
             

		if ($orderCol == 'ordering')
		{
			$orderCol='room_name '.$orderDirn.', r.ordering';
			
			
		}
		
		$query->order($db->escape($orderCol.' '.$orderDirn));
		echo $query;
		return $query;
	}

        
        /**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since   1.6
	 */
	/*protected function populateState($ordering = null, $direction = null)
	{
		$app = JFactory::getApplication('administrator');

		// Load the filter state.
		//$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		//$this->setState('filter.search', $search);

		//$state = $this->getUserStateFromRequest($this->context.'.filter.state', 'filter_state', '', 'string');
		//$this->setState('filter.state', $state);

		//$categoryId = $this->getUserStateFromRequest($this->context.'.filter.category_id', 'filter_category_id', '');
		//$this->setState('filter.category_id', $categoryId);

		//$clientId = $this->getUserStateFromRequest($this->context.'.filter.client_id', 'filter_client_id', '');
		//$this->setState('filter.client_id', $clientId);

		//$language = $this->getUserStateFromRequest($this->context.'.filter.language', 'filter_language', '');
		//$this->setState('filter.language', $language);

		// Load the parameters.
		$params = JComponentHelper::getParams('com_banners');
		$this->setState('params', $params);

		// List state information.
		parent::populateState('a.country', 'asc');
	}*/
	
	
}
