<?php
/**
 * @version		$Id: assets.php 2013-09-01
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Assets Controller
 */
class ThorHospedajeControllerAssets extends JControllerLegacy
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function getModel($name = 'Asset', $prefix = 'ThorHospedajeModel', $config = array('ignore_request' => true)) 
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}

	/**
	 *  Method to return data of assets.
	 * @return  void
	 *
	 * @since   3.0
	 */
	public function assetsAjax()
	{
		$app = JFactory::getApplication();
		// Get the input
		$state_id	= $this->input->getInt('id_state');

		// Get the model
		//$model = $this->getModel();
		$assetsModel = JModelLegacy::getInstance('Assets', 'ThorHospedajeModel', array('ignore_request' => true));
		// Filter by state of publicated
		$assetsModel->setState('filter.state', 1);

		// Filter by language
		$assetsModel->setState('filter.language', $app->getLanguageFilter());
		
		// Filter by state
		$assetsModel->setState('filter.state_id', $state_id);
		
		// Load parameters
		$params = JComponentHelper::getParams('com_thorhospedaje');
		$assetsModel->setState('params', $params);
		
		$items = $assetsModel->getItems();
		
	
		$option = sprintf("<option value=''></option>");
		foreach ($items as $item)
		{
			$option .= sprintf("<option value='%d'>%s</option>", $item->id, htmlspecialchars($item->asset_name));
		}
		echo $option;
		// Close the application
		JFactory::getApplication()->close();
	}
}
