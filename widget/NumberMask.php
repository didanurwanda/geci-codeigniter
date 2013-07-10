<?php

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class NumberMask extends Widget implements iWidget
{
	public function run()
	{
		parent::init();
		
		Html::registerScriptFileBottom($this->coreAssets.'/jquery.numberMask.js');
		$this->jQueryScript('numberMask');
		echo Html::textField($this->htmlOptions);
	}
}
