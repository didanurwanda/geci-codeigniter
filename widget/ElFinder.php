<?php

namespace GeCi\widget;

use \GeCi\component\AssetManager;
use \GeCi\component\Html;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class ElFinder extends Widget implements iWidget
{
	public $lang = null;
	
	public function run()
	{
		parent::init();
		echo Html::tag('div',$this->htmlOptions,'',true);
		
		Html::registerCssFile($this->coreAssets.'/elfinder/css/elfinder.css');
		Html::registerScriptFileBottom($this->coreAssets.'/elfinder/js/elfinder.min.js');
		if($this->lang!==null)
		{
			$this->options['lang']=$this->lang;
			Html::registerScriptFileBottom($this->coreAssets.'/elfinder/js/i18n/elfinder.'.$this->lang.'.js');
		}
		$this->jQueryScript('elfinder');
	}
	
	public function actions($setting=array())
	{
		require_once AssetManager::getComponent()->getCoreAssets() . '/elfinder/php/elFinder_class.php';
        $fm = new \elFinder($setting);
        $fm->run();
	}
}
