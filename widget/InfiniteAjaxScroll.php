<?php

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class InfiniteAjaxScroll extends Widget implements iWidget
{
	public function run()
	{
		parent::init();
		
		Html::registerScriptFileBottom($this->coreAssets.'/ias/jquery.ias.min.js');
		Html::registerCssFile(GeCi::assetManager()->getAssets().'/ias/jquery.ias.css');
		if(!isset($this->options['loader']))
			$this->options['loader'] = img($this->coreAssets.'/ias/loading.gif');
		Html::registerScriptBottom("jQuery.ias(".$this->javaScriptEncode($this->options).");");
	}
}
