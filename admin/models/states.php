<?php

/**
 * @version		$Id: states.php 2013-07-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * States Model
 */
class ThorHospedajeModelStates extends JModelList
{

	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.id',
				'cid', 'a.cid',
				'state_name', 'a.state_name',
         	   	'country_id', 'a.country_id',
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
		$query->select('a.id,a.state_name,a.country_id,a.state,a.access,a.language, a.ordering as ordering');

		// From the states table
		$query->from('#__th_states'.' AS a');

		// Join over the country
		$query->select('c.country AS country_name');
		$query->join('LEFT', $db->quoteName('#__th_countries').' AS c ON c.id = a.country_id');  

       		 // Join over the language
		$query->select('l.title AS language_title');
		$query->join('LEFT', $db->quoteName('#__languages').' AS l ON l.lang_code = a.language');  

		// Join over the asset groups.
		$query->select('ag.title AS access_level');
		$query->join('LEFT', '#__viewlevels AS ag ON ag.id = a.access');

		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			$search = $db->Quote('%'.$db->escape($search, true).'%');
			$query->where('(a.state_name LIKE '.$search.')');
			
		}
		
		// Filter by published state
		$published = $this->getState('filter.published');
		if (is_numeric($published))
		{
			$query->where('a.state = '.(int) $published);
		} elseif ($published === '')
		{
			$query->where('(a.state IN (0, 1))');
		}
		

		// Filter by access level.
		if ($access = $this->getState('filter.access'))
		{
			$query->where('a.access = '.(int) $access);
		}
	
		// Filter on the language.
		if ($language = $this->getState('filter.language'))
		{
			$query->where('a.language = ' . $db->quote($language));
		}
		
		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering', 'ordering');
		$orderDirn	= $this->state->get('list.direction', 'ASC');
             

		if ($orderCol == 'ordering')
		{
			$orderCol='country_name '.$orderDirn.', a.ordering';
			
			
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
		parent::populateState('a.state_name', 'asc');
	}
	
	
}
