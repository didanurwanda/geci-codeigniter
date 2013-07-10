<?php

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class FlowPlayer extends Widget implements iWidget
{
	public $video;
	
	public function run()
	{
		if(!isset($this->htmlOptions['style']))	
			$this->htmlOptions['style']='display:block;width:520px;height:330px';
			
		parent::init();
		
		echo Html::link($this->video,'',$this->htmlOptions);
		
		$fp=$this->coreAssets . '/flowplayer/flowplayer-3.2.10.swf';
		
		Html::registerScriptBottom("flowplayer('{$this->getId()}','{$fp}');");
		Html::registerScriptFileBottom($this->coreAssets . '/flowplayer/flowplayer-3.2.9.min.js');
	}
}
