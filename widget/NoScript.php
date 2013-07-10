<?php

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class NoScript extends Widget implements iWidget
{
	public $redirect;
	public $tagName='div';
	public $content;
	public $class='noscript-error';
	public $width='100%';
	
	public function init()
	{
		if(!isset($this->htmlOptions['class']))
			$this->htmlOptions['class']=$this->class;
			
		parent::init();
		
		echo Html::openTag('noscript',array());
		echo Html::openTag($this->tagName,$this->htmlOptions);
	}
	
	public function run()
	{
		if($this->redirect!==null)
			echo Html::tag('meta',array(
				'http-equiv'=>'refresh',
				'content'=>'0; url='. $this->redirect
			));
		if($this->content!==null)
			echo $this->content;
		
		echo Html::closeTag($this->tagName);
		echo Html::closeTag('noscript');
		
		Html::registerScriptBottom("jQuery('#". $this->getId() ."').hide()"); 
		if($this->class=='noscript-error')
		{
			Html::registerStyle(".noscript-error { width: {$this->width}; padding: 10px; border: 2px solid #e72e2e; background: #fbbbbb }");
		}
		
	}
}
