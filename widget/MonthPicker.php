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
 * @class			MonthPicker
 * @peckage			Widget
 * @subpeckage		Jui Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

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
