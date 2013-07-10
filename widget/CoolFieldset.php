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
 * @class			CoolFieldset
 * @peckage			Widget
 * @subpeckage		Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class CoolFieldset extends Widget implements iWidget
{
	public $legend;
	public $legendHtmlOptions=array();
	
	public function init()
	{
		$this->htmlOptions['class']='coolfieldset';
		parent::init();
		
		echo Html::openTag('fieldset',$this->htmlOptions);
		echo Html::tag('legend',$this->legendHtmlOptions,$this->legend);
	}
	
	public function run()
	{
		echo Html::closeTag('fieldset');
		$this->regClientScript();
	}
	
	protected function regClientScript()
	{
		Html::registerCssFile($this->coreAssets.'/coolfieldset/css/jquery.coolfieldset.css');
		Html::registerScriptFileBottom($this->coreAssets.'/coolfieldset/js/jquery.coolfieldset.min.js');
		$this->jQueryScript('coolfieldset');
	}
}
