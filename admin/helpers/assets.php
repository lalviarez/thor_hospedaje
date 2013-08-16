<?php
/**
 * @version		$Id: assets.php 2013-08-12
 * @copyright		Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */
defined('_JEXEC') or die;

/**
 * Assets component helper.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_thorhospedaje
 * @since       1.6
 */
class AssetsHelper
{
	public static function getAssetsOptions()
	{
		$options = array();

		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);

		$query->select('id as value, asset_name as text');
		$query->from('#__th_assets AS a');
		$query->order('a.asset_name');
		
		// Get the options.
		$db->setQuery($query);

		try
		{
			$options = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			JError::raiseWarning(500, $e->getMessage());
		}

		// Merge any additional options in the XML definition.
		//$options = array_merge(parent::getOptions(), $options);

		array_unshift($options, JHtml::_('select.option', ''));

		return $options;
	}
	
	
	
}
