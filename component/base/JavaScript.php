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
 * @class			JavaScript
 * @peckage			Component
 * @subpeckage		Component
 * @category		Component
 * @author			Dida Nurwanda
 */

namespace GeCi\component\base;

class JavaScript extends \GeCi\component\Component
{	
	public static function encode($value,$safe=false)
	{
		if(is_string($value))
		{
			if(strpos($value,'js:')===0 && $safe===false)
				return substr($value,3);
			else
				return "'".self::quote($value)."'";
		}
		elseif($value===null)
			return 'null';
		elseif(is_bool($value))
			return $value?'true':'false';
		elseif(is_integer($value))
			return "$value";
		elseif(is_float($value))
		{
			if($value===-INF)
				return 'Number.NEGATIVE_INFINITY';
			elseif($value===INF)
				return 'Number.POSITIVE_INFINITY';
			else
				return rtrim(sprintf('%.8F',$value),'0');  // locale-independent representation
		}
		elseif(is_object($value))
			return self::encode(get_object_vars($value),$safe);
		elseif(is_array($value))
		{
			$es=array();
			if(($n=count($value))>0 && array_keys($value)!==range(0,$n-1))
			{
				foreach($value as $k=>$v)
					$es[]=self::quote($k).":".self::encode($v,$safe);
				return '{'.implode(',',$es).'}';
			}
			else
			{
				foreach($value as $v)
					$es[]=self::encode($v,$safe);
				return '['.implode(',',$es).']';
			}
		}
		else
			return '';
	}
	
	public static function quote($js,$forUrl=false)
	{
		if($forUrl)
			return strtr($js,array('%'=>'%25',"\t"=>'\t',"\n"=>'\n',"\r"=>'\r','"'=>'\"','\''=>'\\\'','\\'=>'\\\\','</'=>'<\/'));
		else
			return strtr($js,array("\t"=>'\t',"\n"=>'\n',"\r"=>'\r','"'=>'\"','\''=>'\\\'','\\'=>'\\\\','</'=>'<\/'));
	}
	
	public function jsonEncode($json)
	{
		return json_encode($json);
	}
	
	public function jsonDecode($json)
	{
		return json_decode($json);
	}
}