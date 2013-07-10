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
 * @class			Spinner
 * @peckage			Jui Widget
 * @subpeckage		Jui Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

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