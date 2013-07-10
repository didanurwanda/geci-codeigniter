<?php

namespace GeCi\widget\jui;

use \GeCi\component\AssetManager;
use \GeCi\component\Html;
use \GeCi\widget\Widget as BaseWidget;

abstract class Widget extends BaseWidget
{
	public $cssPathFile='jquery-ui/css/base/';
	public $jsPathFile='jquery-ui/js/';
	
	public $jsFile;
	public $cssFile;
	
	public $jsDisable=false;
	public $cssDisable=false;
	
	
	public function init()
	{
		parent::init();
		$this->registerjQueryUiCoreScript();
	}
	
	public function registerjQueryUiCoreScript()
	{
		$min=ENVIRONMENT=='development' ? '' : '.min';
		
		if($this->jsDisable==false)
		{
			if($this->jsFile===null)
				Html::registerScriptFileBottom($this->coreAssets."/".$this->jsPathFile."jquery-ui{$min}.js");
			else
				Html::registerScriptFileBottom($this->jsFile);
		}
		
		if($this->cssDisable==false)
		{
			if($this->cssFile===null)
				Html::registerCssFile($this->coreAssets."/".$this->cssPathFile."jquery-ui{$min}.css");
			else
				Html::registerCssFile($this->cssFile);
		}
	}
}