<?php

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class Shortcut extends Widget implements iWidget
{
	public function run()
	{
		parent::init();
		Html::registerScriptFileBottom($this->coreAssets.'/jquery.shortcuts.min.js');
		Html::registerScriptBottom("jQuery.Shortcuts.add(". $this->javaScriptEncode($this->options) .").start();");
	}
}
