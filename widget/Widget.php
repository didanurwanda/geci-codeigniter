<?php

namespace GeCi\widget;

use \GeCi\component\AssetManager;
use \GeCi\component\Component;
use \GeCi\component\Html;
use \GeCi\component\JavaScript;

abstract class Widget extends Component
{
	public $htmlOptions=array();
	public $options=array();
	public $coreAssets;
	
	public $id;
	private static $id_number=0;
	private static $id_prefix='geci_';
	
	protected static $object;
	
	public function init()
	{
		$this->coreAssets = base_url(AssetManager::getComponent()->getCoreAssets());
		$this->renderId();
	}
	
	protected function renderId()
	{
		if($this->id!='')
			$this->htmlOptions['id']=$this->id;
		elseif(!isset($this->htmlOptions['id']))
			$this->htmlOptions['id']=$this->getNewId();
		else
			$this->id=$this->htmlOptions['id'];
	}
	
	public function getNewId()
	{
		return $this->id=self::$id_prefix.self::$id_number++;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public static function beginWidget($data = array())
	{
		self::declareWidget($data);
		self::$object->init();
		return self::$object;
	}
	
	public static function end($clean = false)
	{
		self::$object->run();
		$clean ? self::$object = null : false;
	}
	
	public static function widget($data = array())
	{
		self::declareWidget($data);
		if(@method_exists(self::$object, init)){
			self::$object->init();
		}
		self::$object->run();
		self::$object=null;
	}
	
	protected function declareWidget($data = array())
	{
		$class=get_called_class();
		self::$object=new $class;
		self::$object->autoRegister($data);
	}
	
	protected function autoRegister($data = array())
	{
		foreach($data as $key=>$val) {
			$this->$key=$val;
		}
	}

	public function jQueryScript($jQuery, $id=null, $custom=null)
	{
		$option=$custom==null ? $this->javaScriptEncode($this->options) : $custom;
		$id=$id==null ? $this->getId() : $id;
		Html::registerScriptBottom("jQuery('#{$id}').{$jQuery}({$option});"); 
	}
	
	public function javaScriptEncode($js)
	{
		return JavaScript::encode($js);
	}
}