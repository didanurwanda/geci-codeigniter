<?php

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class CLEditor extends Widget implements iWidget
{
	public $name;
	
	public function run()
	{
		parent::init();
		if($this->name!=='')
			$this->htmlOptions['name']=$this->name;		
		echo Html::textArea($this->htmlOptions);
		Html::registerScriptFileBottom($this->coreAssets.'/cleditor/jquery.cleditor.min.js');
		Html::registerCssFile($this->coreAssets.'/cleditor/jquery.cleditor.css');
		$this->jQueryScript('cleditor');
	}
}
