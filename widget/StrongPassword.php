<?php

/**
 * GeCi 
 *
 * Widget dan Library Open Source untuk PHP Framework CodeIgniter
 *
 * @peckage			GeCi
 * @author			Dida Nurwanda
 * @email			didanurwanda@gmail.com
 * @blog			didanurwanda.blogspot.com
 * @copyright		Copyright (c) 2013
 * @license			http://geci.sourceforge.net/license.html
 * @link			http://geci.sourceforge.net
 * @sience			Version 1.0
 */
 
/**
 * @class			StrongPassword
 * @peckage			Widget
 * @subpeckage		Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

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
