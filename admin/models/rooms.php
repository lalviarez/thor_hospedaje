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
				'id', 'r.id',
				'cid', 'r.cid',
				'room_name', 'r.room_name',
         		'th_asset_id', 'r.th_asset_id',
         		'language', 'r.language',   
         		'state', 'r.state',
				'access', 'r.access',
				'ordering', 'r.ordering',
				
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

			// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			$search = $db->Quote('%'.$db->escape($search, true).'%');
			$query->where('(r.room_name LIKE '.$search.')');
			
		}
		
		// Filter by published state
		$published = $this->getState('filter.published');
		if (is_numeric($published))
		{
			$query->where('r.state = '.(int) $published);
		} elseif ($published === '')
		{
			$query->where('(r.state IN (0, 1))');
		}
		

		// Filter by access level.
		if ($access = $this->getState('filter.access'))
		{
			$query->where('r.access = '.(int) $access);
		}
	
		// Filter on the language.
		if ($language = $this->getState('filter.language'))
		{
			$query->where('r.language = ' . $db->quote($language));
		}
		
		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering', 'ordering');
		$orderDirn	= $this->state->get('list.direction', 'ASC');
             

		if ($orderCol == 'ordering')
		{
			$orderCol='room_name '.$orderDirn.', r.ordering';
			
			
		}
		
		$query->order($db->escape($orderCol.' '.$orderDirn));
		return $query;
	}

        
        /**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since   1.6
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		$app = JFactory::getApplication();
		
		// Adjust the context to support modal layouts.
		if ($layout = $app->input->get('layout'))
		{
			$this->context .= '.'.$layout;
		}

		// Load the filter state.
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);
		
		$published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published', '');
		$this->setState('filter.published', $published);
		
		$access= $this->getUserStateFromRequest($this->context.'.filter.access', 'filter_access', '', 'string');
		$this->setState('filter.access', $access);

		$language = $this->getUserStateFromRequest($this->context.'.filter.language', 'filter_language', '');
		$this->setState('filter.language', $language);

		// Load the parameters.
		$params = JComponentHelper::getParams('com_thorhospedaje');
		$this->setState('params', $params);
	

		// List state information.
		parent::populateState('r.room_name', 'asc');
	}
	
	
}
