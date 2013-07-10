<?php

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class Redactor extends Widget implements iWidget
{
	public $name;
	
	public function run()
	{
		parent::init();
		       
		if($this->name!=='')
			$this->htmlOptions['name']=$this->name;
		
		Html::registerScriptFileBottom($this->coreAssets.'/redactor/redactor.min.js');
		Html::registerCssFile($this->coreAssets.'/redactor/redactor.css');
		$this->jQueryScript('redactor');
		echo Html::textArea($this->htmlOptions);
	}
}
