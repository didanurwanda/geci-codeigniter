<?php
 
/**
 * GeCi 
 *
 * Widget dan Library Open Source untuk PHP Framework CodeIgniter
 *
 * @peckage			GeCi
 * @author			Dida Nurwanda
 * @email			didanurwanda@gmail.com
 * @blog			didanurwanda.blogspot.com
 * @copyright		Copyright (c) 2013
 * @license			http://geci.sourceforge.net/license.html
 * @link			http://geci.sourceforge.net
 * @sience			Version 1.0
 */
 
/**
 * @class			Base
 * @peckage			GeCi
 * @subpeckage		
 * @category		Base Library
 * @author			Dida Nurwanda
 */
 
namespace GeCi;

use \GeCi\component\AssetManager;
use \GeCi\component\Component;
use \GeCi\component\Html;

define('GECI_PATH',dirname(__FILE__));

class Base
{

	public function __construct()
	{
		AssetManager::getComponent()->registerCoreAssets();
		Component::app()->load->helper(array('html','form','url')); 
		
		if(self::config('jquery_autoload'))
		{
			$min=ENVIRONMENT=='development' ? '' : '.min';
			Html::registerScriptFile(base_url() . AssetManager::getComponent()->getCoreAssets()."/jquery-1.7.2{$min}.js");
		}
	}
	
	public function config($name)
	{
		require (dirname(__FILE__).'/config.php');
		return isset($config[$name]) ? $config[$name] : '';
	}
	
	public static function getVersion()
	{
		return '1.0-dev';
	}
	
	public static function autoload($className)
	{
		$className = str_replace('\\','/',$className);	
		$geciClassName = GECI_PATH . '/../' . $className . EXT;
	
		if(file_exists($geciClassName))
			include_once $geciClassName;
		elseif(file_exists(SYSDIR.'/core/'.$className.EXT))
			include_once SYSDIR.'/core/'.$className.EXT;
	}
	
	public static function  registerAutoloader($callback)
	{
		spl_autoload_unregister(array('GeCi','autoload'));
		spl_autoload_register($callback);
		spl_autoload_register(array('GeCi','autoload'));
	}
}