<?php
/**
 * @version		$Id: states.php 2013-09-01
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * States Controller
 */
class ThorHospedajeControllerStates extends JControllerLegacy
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function getModel($name = 'State', $prefix = 'ThorHospedajeModel', $config = array('ignore_request' => true)) 
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}

	/**
	 *  Method to return data of states.
	 * @return  void
	 *
	 * @since   3.0
	 */
	public function statesAjax()
	{
		$app = JFactory::getApplication();
		// Get the input
		$id_country	= $this->input->getInt('id_country');

		// Get the model
		//$model = $this->getModel();
		$statesModel = JModelLegacy::getInstance('States', 'ThorHospedajeModel', array('ignore_request' => true));
		// Filter by state of publicated
		$statesModel->setState('filter.state', 1);

		// Filter by language
		$statesModel->setState('filter.language', $app->getLanguageFilter());
		
		// Filter by Country
		$statesModel->setState('filter.id_country', $id_country);
		
		// Load parameters
		$params = JComponentHelper::getParams('com_thorhospedaje');
		$statesModel->setState('params', $params);
		
		$items = $statesModel->getItems();
		

		$option = sprintf("<option value=''></option>");
		foreach ($items as $item)
		{
			$option .= sprintf("<option value='%d'>%s</option>", $item->id, htmlspecialchars($item->state_name));
		}
		echo $option;
		// Close the application
		JFactory::getApplication()->close();
	}
}
