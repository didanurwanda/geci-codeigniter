<?php

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\jui\DatePicker;

class MonthPicker extends DatePicker 
{
	public function registerClientScript()
	{	
		$default=array(
			'monthNames'=>array('January','February','March','April','May','June','July','August','September','October','November','December'),
			'monthNamesShort'=>array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'),
			'prevText'=>'Prev',
			'nextText'=>'Next',
		);
		$options=array_merge($this->options,$default);
		Html::registerScriptFileBottom($this->coreAssets.'/monthPicker/jquery.ui.monthpicker.js');
		$this->jQueryScript('monthpicker'); 
		
	}
}
