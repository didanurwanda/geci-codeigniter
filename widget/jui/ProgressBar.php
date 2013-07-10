<?php

namespace GeCi\widget\jui;

use \GeCi\component\Html;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class ProgressBar extends Widget implements iWidget
{
	public $tagName='div';
	public $value=0;
	public $animated=false;
	public $animatePath;
	public $resizable=false;
	
	public function run()
	{
		parent::init();
		
		echo Html::Tag($this->tagName,$this->htmlOptions,'',true);
		
		if(!isset($this->options['value']))
			$this->options['value']=$this->value;
		
		$this->jQueryScript('progressbar');
		
		if($this->resizable)
		{
			$this->jQueryScript('resizable',null,'{maxHeight:22,minHeight:22}');
		}
		
		if($this->animated)
			Html::registerStyle($this->tagName.'#'.$this->getId().'.ui-progressbar .ui-progressbar-value{ background-image: url( '.($this->animatePath===null ? $this->coreAssets.'/jquery-ui/images/pbar-ani.gif' : $this->animatePath).' )}');
	}
}