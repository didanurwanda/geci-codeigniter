<?php

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class TreeView extends Widget implements iWidget
{
	public $items=array();
	public $tagName='ul';
	
	public function init()
	{
		if(!isset($this->htmlOptions['class']))
			$this->htmlOptions['class']='filetree';
			
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
		$this->clientScript();
	}
	
	public function renderItem($item, $htmlOptions=array())
	{
		echo Html::openTag($this->tagName, $htmlOptions);
		foreach($item as $row)
		{
			$childOptions=isset($row['childOptions']) ? $row['childOptions'] : array();
			echo Html::openTag('li');
			$label= isset($row['label']) ? $row['label'] : ''; unset($row['label']);
			$items=isset($row['items']) ? $row['items'] : ''; unset($row['items']);
			
			if(isset($row['visible']) && $row['visible']==false)
			{
				unset($row['visible']);
				if(isset($childOptions['class']))
					$childOptions['class'].=' treeview-hidden';
				else
					$childOptions['class']=' treeview-hidden';
			}
				
			if(isset($row['href']))
				echo Html::tag('a', $row, $label, true);
			else
				echo Html::tag('span', $row, $label, true);
			
			if($items!=='')
				self::renderItem($items, $childOptions);
			echo Html::closeTag('li');
		}
		echo Html::closeTag($this->tagName);
	}
	
	public function clientScript()
	{
		Html::registerScriptFileBottom($this->coreAssets.'/jquery.cookie.js');
		Html::registerScriptFileBottom($this->coreAssets.'/jquery.treeview/jquery.treeview.js');
		Html::registerCssFile($this->coreAssets.'/jquery.treeview/jquery.treeview.css');
		$this->jQueryScript('treeview');	
	}
}
