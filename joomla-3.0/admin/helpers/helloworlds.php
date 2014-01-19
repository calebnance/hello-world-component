<?php
/*------------------------------------------------------------------------
# helloworlds.php - Hello World Component
# ------------------------------------------------------------------------
# author    Caleb Nance
# copyright Copyright (C) 2013. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   www.codelydia.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Helloworlds component helper.
 */
abstract class HelloworldsHelper
{
	/**
	 *	Configure the Linkbar.
	 */
	public static function addSubmenu($submenu) 
	{
		JHtmlSidebar::addEntry(JText::_('Helloworlds'), 'index.php?option=com_helloworlds&view=helloworlds', $submenu == 'helloworlds');
		JHtmlSidebar::addEntry(JText::_('Categories'), 'index.php?option=com_categories&view=categories&extension=com_helloworlds', $submenu == 'categories');

		// set some global property
		$document = JFactory::getDocument();
		if ($submenu == 'categories'):
			$document->setTitle(JText::_('Categories - Helloworlds'));
		endif;
	}

	/**
	 *	Get the actions
	 */
	public static function getActions($Id = 0)
	{
		jimport('joomla.access.access');

		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($Id)):
			$assetName = 'com_helloworlds';
		else:
			$assetName = 'com_helloworlds.message.'.(int) $Id;
		endif;

		$actions = JAccess::getActions('com_helloworlds', 'component');

		foreach ($actions as $action):
			$result->set($action->name, $user->authorise($action->name, $assetName));
		endforeach;

		return $result;
	}
}
?>