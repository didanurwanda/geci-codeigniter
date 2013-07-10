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
 * @class			DatePicker
 * @peckage			Jui Widget
 * @subpeckage		Jui Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

namespace GeCi\widget\jui;

use \GeCi\component\Html;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class DatePicker extends Widget implements iWidget
{
	public $showField=true;
	public $tagName='div';
	public $lang;
	
	public function run()
	{
		parent::init();
		
		if($this->showField)
			echo Html::textField($this->htmlOptions);
		else
			echo Html::tag($this->tagName,$this->htmlOptions,'',true); 
		
		$this->registerClientScript();	

		if($this->lang!==null)
		{
			$min=ENVIRONMENT=='development' ? '' : '.min';
			Html::registerScriptFileBottom($this->coreAssets."/".$this->jsPathFile."i18n{$min}/jquery.ui.datepicker-{$this->lang}{$min}.js");
		}		
	}
	
	public function registerClientScript()
	{
		$this->jQueryScript('datepicker');
	}
}