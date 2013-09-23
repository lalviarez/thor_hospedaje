<?php
/**
 * @version		$Id: reservation.php 2013-09-12
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * reservation Controller
 */
class ThorHospedajeControllerReservation extends JControllerLegacy
{
	protected $reservationData = array();
	
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function getModel($name = 'Reservation', $prefix = 'ThorHospedajeModel', $config = array('ignore_request' => true)) 
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}

	/**
	 * Save the reservation data
	 *
	 * @since  0.1.0
	 * 
	 * @return void
	 */
	public function save()
	{
		$model = $this->getModel();
		$resTable = JTable::getInstance('Reservation', 'ThorHospedajeTable');

		// Get the data from user state and build a correct array that is ready to be stored
		//$this->prepareSavingData();
		//$app = JFactory::getApplication();
		$this->reservationData = $this->input->post->get('jform', array(), 'array');
		//$app->input->get('client-name');
		//echo "Hola ". $this->reservationData;
		/*print_r($this->reservationData);
		exit(0);*/
		if(!$model->save($this->reservationData))
		{
			// Fail, turn back and correct
			$msg = JText::_('SR_RESERVATION_SAVE_ERROR');
			$this->setRedirect($this->reservationData['returnurl'], $msg);
		}
		else
		{
			// Prepare some data for final layout
			/*$savedReservationId = $model->getState($model->getName().'.id');
			$resTable->load($savedReservationId);
			$this->app->setUserState($this->context.'.savedReservationId', $savedReservationId);
			$this->app->setUserState($this->context.'.code', $resTable->code);
			$this->app->setUserState($this->context.'.customeremail', $this->reservationData['customer_email']);

			$this->finalize();*/
		}
	}
}
