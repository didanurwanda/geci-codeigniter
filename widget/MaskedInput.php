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
 * @class			TreeView
 * @peckage			Widget
 * @subpeckage		Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class MaskedInput extends Widget implements iWidget
{
	public $mask;
	
	public function run()
	{
		parent::init();
		
		Html::registerScriptFileBottom($this->coreAssets.'/jquery.masked-input.min.js');
		Html::registerScriptBottom("jQuery('#". $this->getId() ."').mask('{$this->mask}',". $this->javaScriptEncode($this->options) .");");
		echo Html::textField($this->htmlOptions);
	}
}
