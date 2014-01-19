<?php
/*------------------------------------------------------------------------
# router.php - Hello World Component
# ------------------------------------------------------------------------
# author    Caleb Nance
# copyright Copyright (C) 2013. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   www.codelydia.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

function HelloworldsBuildRoute(&$query)
{
	$segments = array();

	if(isset($query['view'])):
		$segments[] = $query['view'];
		unset($query['view']);
	endif;

	if(isset($query['id'])):
		$segments[] = $query['id'];
		unset($query['id']);
	endif;

	return $segments;
}

function HelloworldsParseRoute($segments)
{
	$vars = array();
	// Count segments
	$count = count($segments);
	//Handle View and Identifier
	switch($segments[0])
	{
		case 'helloworlds':
			$id = explode(':', $segments[$count-1]);
			$vars['id'] = (int) $id[0];
			$vars['view'] = 'helloworlds';
			break;

		case 'helloworld':
			$id = explode(':', $segments[$count-1]);
			$vars['id'] = (int) $id[0];
			$vars['view'] = 'helloworld';
			break;
	}

	return $vars;
}
?>