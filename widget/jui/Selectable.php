<?php

namespace GeCi\widget\jui;

use \GeCi\component\Html;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class Selectable extends Widget implements iWidget
{
	public $tagName='div';
	public $items=array();
	public $itemHtmlOptions=array();
	public $itemTemplate='<li id="{id}" {items}>{content}</li>';
	
	public function run()
	{		
		parent::init();
		echo Html::openTag($this->tagName,$this->htmlOptions);
		
		if(isset($this->itemHtmlOptions['id']))
			unset($this->itemHtmlOptions['id']);
			
		$itemHtmlOptions=Html::parseAttributes($this->itemHtmlOptions);
		
		foreach($this->items as $id=>$content)
		{
			echo strtr($this->itemTemplate,array(
				'{id}'=>$id,
				'{content}'=>$content,
				'{items}'=>$itemHtmlOptions
			));
		}
			
		echo Html::closeTag($this->tagName);
		$this->jQueryScript('selectable');
	}
}