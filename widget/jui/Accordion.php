<?php

namespace GeCi\widget\jui;

use \GeCi\component\Html;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class Accordion extends Widget implements iWidget
{
	public $panels=array();
	public $headerTemplate='<h3><a href="#">{title}</a></h3>';
	public $tagName='div';
	public $contentTemplate='<div>{content}</div>';
	
	public function run()
	{	
		parent::init();
		
		echo Html::openTag($this->tagName,$this->htmlOptions);
		foreach($this->panels as $key=>$val)
		{
			echo strtr($this->headerTemplate,array('{title}'=>$key));
			echo strtr($this->contentTemplate,array('{content}'=>$val));
		}
		
		echo Html::closeTag($this->tagName);
		$this->jQueryScript('accordion');
	}
}