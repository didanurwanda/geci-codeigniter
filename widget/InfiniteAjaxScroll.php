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
 * @class			InfiniteAjaxScroll
 * @peckage			Widget
 * @subpeckage		Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

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
