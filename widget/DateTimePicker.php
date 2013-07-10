<?php

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
