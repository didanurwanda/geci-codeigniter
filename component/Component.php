<?php

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