<?php

namespace GeCi\widget\jui;

use \GeCi\component\Html;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class Dialog extends Widget implements iWidget
{
	public $title;
	public $content;
	public $tagName='div';
	
	public function init()
	{
		parent::init();
		
		if(!isset($this->htmlOptions['title']))
			$this->htmlOptions['title']=$this->title;
			
		echo Html::openTag($this->tagName, $this->htmlOptions);
		echo $this->content;
	}
	
	public function run()
	{
		echo Html::closeTag($this->tagName);
		$this->jQueryScript('dialog');
	}
}