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
 * @class			Component
 * @peckage			
 * @subpeckage		Component
 * @category		Component
 * @author			Dida Nurwanda
 */

namespace GeCi\component;

class Component
{
	public static $CI;
	public static $componentObject;
	
	public function app()
	{
		if(self::$CI == null)
			self::$CI = get_instance();
		return self::$CI;
	}
	
	public static function getComponent()
	{
		$class=get_called_class();
		if(self::$componentObject==null)
			self::$componentObject=new $class;
		return self::$componentObject;
	}
	
}