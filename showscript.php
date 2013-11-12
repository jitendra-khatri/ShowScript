<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.plugin.plugin' );
 
/**
 * Show Script system plugin
 * Author : Jitendra Khatri
 */
class plgSystemShowScript extends JPlugin
{
	// Works just before Joomla framework Render Content.
	function onBeforeRender()
	{
		// Gets Site App.
		$app	= JFactory::getApplication();
		
		// Admin-End then do Nothing 
		if($app->isAdmin()){
			return false;
		}
		
		// Gets Plugin Params
		$params = $this->params;
		
		// Gets Script to add on Document
		$scriptCode = $params->get('script_code');
		$scriptURL	= $params->get('script_url');
		$document = JFactory::getDocument();
		
		// Add Script on Document.
		$document->addScriptDeclaration($scriptCode);
		
		// Loads Script Form the URL
		$document->addScript("$scriptURL");
		
		return true;		
	}
}?>