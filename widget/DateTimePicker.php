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
 * @class			DateTimePicker
 * @peckage			Widget
 * @subpeckage		Jui Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\jui\DatePicker;

class DateTimePicker extends DatePicker
{
	public $mode='datetime';
	
	public function registerClientScript()
	{
		$options=$this->javaScriptEncode($this->options);			
		Html::registerScriptBottom("jQuery('#{$this->getId()}').{$this->mode}picker(jQuery.extend({showMonthAfterYear:false},{$options}));");
		Html::registerScriptFileBottom($this->coreAssets.'/dateTimePicker/jquery-ui-timepicker-addon.js');
		Html::registerCssFile($this->coreAssets.'/dateTimePicker/jquery-ui-timepicker-addon.css');
	}	
}
