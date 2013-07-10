<?php

namespace GeCi\widget\jui;

use \GeCi\component\Html;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class Spinner extends Widget implements iWidget
{
	public function run()
	{
		parent::init();		
		echo Html::textField($this->htmlOptions);
		$this->jQueryScript('spinner');
	}
}