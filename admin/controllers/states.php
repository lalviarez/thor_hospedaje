<?php

/**
 * @version		$Id: countries.php 2013-07-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * States Controller
 */
class ThorHospedajeControllerStates extends JControllerAdmin
{
	
	/**
	 * @var		string	The prefix to use with controller messages.
	 * @since   1.6
	 */
	protected $text_prefix = 'TH_STATES';
	
		
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
	 *  Method to save the submitted ordering values for records via AJAX.
	 * @return  void
	 *
	 * @since   3.0
	 */
	public function saveOrderAjax()
	{
		
		// Get the input
		$pks = $this->input->post->get('cid', array(), 'array');
		$order = $this->input->post->get('order', array(), 'array');

		// Sanitize the input
		JArrayHelper::toInteger($pks);
		JArrayHelper::toInteger($order);

		// Get the model
		$model = $this->getModel();

		// Save the ordering
		$return = $model->saveorder($pks, $order);

		if ($return)
		{
			echo "1";
		}

		// Close the application
		JFactory::getApplication()->close();
	}
}

