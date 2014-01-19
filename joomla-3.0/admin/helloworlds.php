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

// Added for Joomla 3.0
if(!defined('DS')):
	define('DS',DIRECTORY_SEPARATOR);
endif;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_helloworlds')):
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
endif;

// Load cms libraries
JLoader::registerPrefix('J', JPATH_PLATFORM . '/cms');
// Load joomla libraries without overwrite
JLoader::registerPrefix('J', JPATH_PLATFORM . '/joomla',false);

// require helper files
JLoader::register('HelloworldsHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'helloworlds.php');

// import joomla controller library
jimport('joomla.application.component.controller');

// Add CSS file for all pages
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_helloworlds/assets/css/helloworlds.css');
$document->addScript('components/com_helloworlds/assets/js/helloworlds.js');

// Get an instance of the controller prefixed by Helloworlds
$controller = JControllerLegacy::getInstance('Helloworlds');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();

?>