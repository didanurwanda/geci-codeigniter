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
 * @class			Menu
 * @peckage			Jui Widget
 * @subpeckage		Jui Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

namespace GeCi\widget\jui;

use \GeCi\component\Html;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class Menu extends Widget implements iWidget
{
	public $items=array();
	public $tagName='ul';
	
	public function init()
	{
		parent::init();
		if(isset($this->items) && !empty($this->items))
			$this->renderItem($this->items, $this->htmlOptions);
		else
			echo Html::openTag($this->tagName, $this->htmlOptions);
	}
	
	public function run()
	{
		if(empty($this->items))
			echo Html::closeTag($this->tagName);
		$this->jQueryScript('menu');
	}
	
	public function renderItem($item, $htmlOptions=array())
	{
		echo Html::openTag($this->tagName, $htmlOptions);
		foreach($item as $row)
		{
			$liOptions=array();
			if(isset($row['disable']) && $row['disable']==true)
			{
				$liOptions['class']='ui-state-disabled';
				unset($row['disable']);
			}			
			echo Html::openTag('li', $liOptions);
			
			$label= isset($row['label']) ? $row['label'] : ''; unset($row['label']);
			$items=isset($row['items']) ? $row['items'] : ''; unset($row['items']);
			
			if(!isset($row['href']))
				$row['href']='javascript:void(0)';
				
			if(isset($row['ui-icon']))
			{
				$label = Html::tag('span', array('class'=>'ui-icon ui-icon-'.$row['ui-icon']),'',true) . $label;
				unset($row['ui-icon']);
			}
							
			echo Html::tag('a', $row, $label, true);
			
			if($items!=='')
				self::renderItem($items);
			echo Html::closeTag('li');
		}
		echo Html::closeTag($this->tagName);
	}
}
