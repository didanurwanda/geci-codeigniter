<?php

/**
 * GeCi 
 *
 * Widget dan Library Open Source untuk PHP Framework CodeIgniter
 *
 * @peckage			GeCi
 * @author			Dida Nurwanda
 * @email			didanurwanda@gmail.com
 * @blog			didanurwanda.blogspot.com
 * @copyright		Copyright (c) 2013
 * @license			http://geci.sourceforge.net/license.html
 * @link			http://geci.sourceforge.net
 * @sience			Version 1.0
 */
 
/**
 * @class			NewsTicker
 * @peckage			Widget
 * @subpeckage		Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

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
