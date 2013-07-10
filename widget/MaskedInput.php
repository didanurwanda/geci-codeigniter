<?php

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class MaskedInput extends Widget implements iWidget
{
	public $mask;
	
	public function run()
	{
		parent::init();
		
		Html::registerScriptFileBottom($this->coreAssets.'/jquery.masked-input.min.js');
		Html::registerScriptBottom("jQuery('#". $this->getId() ."').mask('{$this->mask}',". $this->javaScriptEncode($this->options) .");");
		echo Html::textField($this->htmlOptions);
	}
}
