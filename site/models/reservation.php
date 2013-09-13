<?php

/**
 * @version		$Id: reservation.php 2013-09-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * Reservation Model
 */
class ThorHospedajeModelReservation extends JModelItem
{
	
	protected $view_item = 'reservation';

	protected $_item = null;

	/**
	 * Model context string.
	 *
	 * @var		string
	 */
	protected $_context = 'com_thorhospedaje.reservation';
	
	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @return  void
	 * @since   1.6 <- Hay que averiguar que es esto y dejarlo o eliminarlo
	 */
	
	/**
     * Save the reservation data
     *
     * @param $data
     * 
     * @return bool
     */
    public function save($data)
	{
		$dispatcher = JDispatcher::getInstance();
		$table		= $this->getTable();
		$pk			= (!empty($data['id'])) ? $data['id'] : (int)$this->getState($this->getName().'.id');
		$isNew		= true;
		$app = JFactory::getApplication();
		//$roomTypePricesMapping = $app->getUserState($this->context.'.room_type_prices_mapping', NULL);

		// Include the content plugins for the on save events.
		//JPluginHelper::importPlugin('extension');

		// Load the row if saving an existing record.
		if ($pk > 0)
        {
			$table->load($pk);
			$isNew = false;
		}

		// Bind the data.
		if (!$table->bind($data))
        {
			$this->setError($table->getError());
			return false;
		}

		// Prepare the row for saving
		//$this->prepareTable($table);

		// Check the data.
		if (!$table->check())
        {
			$this->setError($table->getError());
			return false;
		}

		// Trigger the onContentBeforeSave event.
		/*$result = $dispatcher->trigger($this->event_before_save, array($data, $table, $isNew, $this));
		if (in_array(false, $result, true))
        {
			return false;
		}*/

		// Store the data.
		if (!$table->store())
        {
			$this->setError($table->getError());
			return false;
		}

		// Clean the cache.
		$cache = JFactory::getCache($this->option);
		$cache->clean();

		// Trigger the onContentAfterSave event.
		/*$this->setState($this->getName().'.room_type_prices_mapping', $roomTypePricesMapping);
		$result = $dispatcher->trigger($this->event_after_save, array($data, $table, $isNew, $this));
		if (in_array(false, $result, true))
        {
			return false;
		}

		$pkName = $table->getKeyName();
		if (isset($table->$pkName))
        {
			$this->setState($this->getName().'.id', $table->$pkName);
		}*/
		$this->setState($this->getName().'.new', $isNew);

		return true;
	}

	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param	string	$type The table type to instantiate
	 * @param	string	$prefix A prefix for the table class name. Optional.
	 * @param	array	$config Configuration array for model. Optional.
	 * @return	JTable	A database object
	 * @since	1.6
	 */
	public function getTable($type = 'Reservation', $prefix = 'ThorHospedajeTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
}
