<?php

namespace GeCi\widget\jui;

use \GeCi\component\Html;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class Resizable extends Widget implements iWidget
{
	public $tagName='div';
	
	public function init()
	{
		parent::init();
		echo Html::openTag($this->tagName, $this->htmlOptions);
	}
	
	public function run()
	{		
		echo Html::closeTag($this->tagName);
		$this->jQueryScript('resizable');
	}
}