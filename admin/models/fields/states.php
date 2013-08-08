<?php
/**
 * @version		$Id: states.php 2013-07-29
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('JPATH_BASE') or die;

JFormHelper::loadFieldClass('list');

require_once __DIR__ . '/../../helpers/states.php';

/**
 * States Field class for the Joomla Framework.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_thorhospedaje
 * @since       1.6
 */
class JFormFieldStates extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since   1.6
	 */
	protected $type = 'States';

	/**
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
	 * @since   1.6
	 */
	public function getOptions()
	{
		return StatesHelper::getStatesOptions();
	}
}
