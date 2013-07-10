<?php

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class jQueryValidation extends Widget implements iWidget
{
	public function run()
	{
		parent::init();
		Html::registerScriptFileBottom($this->coreAssets.'/jquery.validate.min.js');
		$this->jQueryScript('validate');
	}
}
