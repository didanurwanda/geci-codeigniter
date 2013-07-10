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
 * @class			CLEditor
 * @peckage			Widget
 * @subpeckage		Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class CLEditor extends Widget implements iWidget
{
	public $name;
	
	public function run()
	{
		parent::init();
		if($this->name!=='')
			$this->htmlOptions['name']=$this->name;		
		echo Html::textArea($this->htmlOptions);
		Html::registerScriptFileBottom($this->coreAssets.'/cleditor/jquery.cleditor.min.js');
		Html::registerCssFile($this->coreAssets.'/cleditor/jquery.cleditor.css');
		$this->jQueryScript('cleditor');
	}
}
