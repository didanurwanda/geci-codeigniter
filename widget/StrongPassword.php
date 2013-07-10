<?php

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class StrongPassword extends Widget implements iWidget
{
	public function run()
	{
		parent::init();
		echo Html::passwordField($this->htmlOptions);
		
		if(!isset($this->options['minChar']))
			$this->options['minChar']=4;
			
		Html::registerScriptFileBottom($this->coreAssets.'/digitialspaghetti.password.min.js');
		$this->jQueryScript('pstrength');
	}
}
