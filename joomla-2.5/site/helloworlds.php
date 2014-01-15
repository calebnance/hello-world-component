<?php
/*------------------------------------------------------------------------
# helloworlds.php - Hello World Component
# ------------------------------------------------------------------------
# author	Caleb Nance
# copyright	Copyright (C) 2013. All Rights Reserved
# license	GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website	www.codelydia.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Set the component css/js
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_helloworlds/assets/css/helloworlds.css');

// Require helper file
JLoader::register('HelloworldsHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'helloworlds.php');

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by Helloworlds
$controller = JController::getInstance('Helloworlds');

// Perform the request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
?>