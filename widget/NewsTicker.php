<?php

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class NewsTicker extends Widget implements iWidget
{
	public $items=array();
	public $itemHtmlOptions=array();
	
	public function init()
	{
		if(!isset($this->htmlOptions['id']))
			$this->htmlOptions['id']='js-news';
		if(!isset($this->htmlOptions['class']))
			$this->htmlOptions['class']='js-hidden';
			
		parent::init();
		echo Html::openTag('ul',$this->htmlOptions);
	}
	
	public function run()
	{
		if(isset($this->items))
		{
			if(!isset($this->itemHtmlOptions['class']))
				$this->itemHtmlOptions['class']='news-item';
				
			foreach($this->items as $row)
			{
				echo Html::openTag('li',$this->itemHtmlOptions);
				echo Html::link($row['url'],$row['value'],array());
				echo Html::closeTag('li');
			}
		}
		echo Html::closeTag('ul');
		$this->clientScript();
	}
	
	public function clientScript()
	{
		Html::registerCssFile($this->coreAssets.'/news_ticker/ticker-style.css');
		Html::registerScriptFileBottom($this->coreAssets.'/news_ticker/jquery.ticker.js');
		$this->jQueryScript('ticker');
	}
}
