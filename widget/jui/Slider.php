<?php

namespace GeCi\widget\jui;

use \GeCi\component\Html;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class Slider extends Widget implements iWidget
{
	public $tagName='div';
	public $value;
	
	public function run()
	{
		parent::init();
		echo Html::tag($this->tagName,$this->htmlOptions,'',true);
		if($this->value!==null)
			$this->options['value']=$this->value;
		$this->jQueryScript('slider');
	}
}