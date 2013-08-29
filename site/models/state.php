<?php

/**
 * @version		$Id: state.php 2013-08-16
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * State Model
 */
class ThorHospedajeModelState extends JModelItem
{
	
	protected $view_item = 'state';

	protected $_item = null;

	/**
	 * Model context string.
	 *
	 * @var		string
	 */
	protected $_context = 'com_thorhospedaje.state';
	
	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @return  void
	 * @since   1.6 <- Hay que averiguar que es esto y dejarlo o eliminarlo
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication('site');
		$params = $app->getParams();
		
		// List state information
		// Load the parameters.
		$this->setState('params', $params);
		
		// Se calculan los elementos a traer en cada consulta
		$value = ((int) $params->get('state-rowcount', 2)) * ((int) $params->get('state-rowcount', 2));
		$this->setState('list.limit', $value);

		$value = $app->input->get('limitstart', 0, 'uint');
		$this->setState('list.start', $value);
		

		// LJAH: Ojo con este ordenamiento que no está probado
		$this->setState('list.ordering', 'ordering');
		$this->setState('list.direction', 'ASC');

		$this->setState('filter.language', $app->getLanguageFilter());
		
		// Load state from the request.
		$pk = $app->input->getInt('id');
		$this->setState('state.id', $pk);
		
		// Filter by state, only published
		$this->setState('filter.state', 1);
	}
	
	/**
	 * Method to get state data
	 * @param array
	 * @return mixed Object or null
	 */
	public function &getItem($pk = null)
	{
		$pk = (!empty($pk)) ? $pk : (int) $this->getState('state.id');

		if ($this->_item === null)
		{
			$this->_item = array();
		}

		if (!isset($this->_item[$pk]))
		{
			try {
				$db = $this->getDbo();
				$query = $db->getQuery(true);

				// Query for Country
				// Select field to query
				$query->select($this->getState('list.select', 'a.*'));
				$query->from($db->quoteName('#__th_states').' AS a');
				
				// Filter by state
				$state = $this->getState('filter.state');
				if (is_numeric($state))
				{
					$query->where('a.state = '.(int) $state);
				}
				
				// Filter by language
				if ($this->getState('filter.language'))
				{
					$query->where('a.language in (' . $db->Quote(JFactory::getLanguage()->getTag()) . ',' . $db->Quote('*') . ')');
				}	
				
				// Add the list ordering clause.
				$query->order($db->escape($this->getState('list.ordering', 'a.ordering')).' '.$db->escape($this->getState('list.direction', 'ASC')));

				$query->where('a.id = ' . (int) $pk);

				$db->setQuery($query);
				$state = $db->loadObject();
				
				if (empty($state))
				{
					return JError::raiseError(404, JText::_('TH_STATE_ERROR_STATE_NOT_FOUND'));
				}
				// End query for Country	
			/*	
				// Filter by start and end dates.
				$nullDate = $db->Quote($db->getNullDate());
				$date = JFactory::getDate();

				$nowDate = $db->Quote($date->toSql());

				$query->where('(a.publish_up = ' . $nullDate . ' OR a.publish_up <= ' . $nowDate . ')');
				$query->where('(a.publish_down = ' . $nullDate . ' OR a.publish_down >= ' . $nowDate . ')');

				// Join to check for category published state in parent categories up the tree
				// If all categories are published, badcats.id will be null, and we just use the article state
				$subquery = ' (SELECT cat.id as id FROM #__categories AS cat JOIN #__categories AS parent ';
				$subquery .= 'ON cat.lft BETWEEN parent.lft AND parent.rgt ';
				$subquery .= 'WHERE parent.extension = ' . $db->quote('com_content');
				$subquery .= ' AND parent.published <= 0 GROUP BY cat.id)';
				$query->join('LEFT OUTER', $subquery . ' AS badcats ON badcats.id = c.id');

				// Filter by published state.
				$published = $this->getState('filter.published');
				$archived = $this->getState('filter.archived');

				if (is_numeric($published))
				{
					$query->where('(a.state = ' . (int) $published . ' OR a.state =' . (int) $archived . ')');
				}

				$db->setQuery($query);

				$data = $db->loadObject();

				if (empty($data))
				{
					return JError::raiseError(404, JText::_('COM_CONTENT_ERROR_ARTICLE_NOT_FOUND'));
				}

				// Check for published state if filter set.
				if (((is_numeric($published)) || (is_numeric($archived))) && (($data->state != $published) && ($data->state != $archived)))
				{
					return JError::raiseError(404, JText::_('COM_CONTENT_ERROR_ARTICLE_NOT_FOUND'));
				}
*/

				// Convert parameter fields to objects.
				if (isset($state->params) && ($state->params))
				{
					$registry = new JRegistry;
					$registry->loadString($state->params);
					$state->params = clone $this->getState('params');
					$state->params->merge($registry);
				}
/*
				$registry = new JRegistry;
				$registry->loadString($data->metadata);
				$data->metadata = $registry;

				// Compute selected asset permissions.
				$user	= JFactory::getUser();

				// Technically guest could edit an article, but lets not check that to improve performance a little.
				if (!$user->get('guest'))
				{
					$userId	= $user->get('id');
					$asset	= 'com_content.article.'.$data->id;

					// Check general edit permission first.
					if ($user->authorise('core.edit', $asset))
					{
						$data->params->set('access-edit', true);
					}
					// Now check if edit.own is available.
					elseif (!empty($userId) && $user->authorise('core.edit.own', $asset))
					{
						// Check for a valid user and that they are the owner.
						if ($userId == $data->created_by)
						{
							$data->params->set('access-edit', true);
						}
					}
				}

				// Compute view access permissions.
				if ($access = $this->getState('filter.access'))
				{
					// If the access filter has been set, we already know this user can view.
					$data->params->set('access-view', true);
				}
				else {
					// If no access filter is set, the layout takes some responsibility for display of limited information.
					$user = JFactory::getUser();
					$groups = $user->getAuthorisedViewLevels();

					if ($data->catid == 0 || $data->category_access === null)
					{
						$data->params->set('access-view', in_array($data->access, $groups));
					}
					else {
						$data->params->set('access-view', in_array($data->access, $groups) && in_array($data->category_access, $groups));
					}
				}*/

				$this->_item[$pk] = $state;
			}
			catch (Exception $e)
			{
				if ($e->getCode() == 404)
				{
					// Need to go thru the error handler to allow Redirect to work.
					JError::raiseError(404, $e->getMessage());
				}
				else {
					$this->setError($e);
					$this->_item[$pk] = false;
				}
			}
		}
		return $this->_item[$pk];
	}
}
