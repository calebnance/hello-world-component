<?php
/*------------------------------------------------------------------------
# controller.php - Hello World Component
# ------------------------------------------------------------------------
# author	Caleb Nance
# copyright	Copyright (C) 2013. All Rights Reserved
# license	GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website	www.codelydia.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * General Controller of Helloworlds component
 */
class HelloworldsController extends JControllerLegacy
{
	/**
	 * display task
	 *
	 * @return void
	 */
	function display($cachable = false, $urlparams = false)
	{
		// set default view if not set
		JRequest::setVar('view', JRequest::getCmd('view', 'Helloworlds'));

		// call parent behavior
		parent::display($cachable);

		// set view
		$view = strtolower(JRequest::getVar('view'));

		// Set the submenu
		HelloworldsHelper::addSubmenu($view);
	}
}
?>