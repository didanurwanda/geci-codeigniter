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
 * @class			HighCharts
 * @peckage			Widget
 * @subpeckage		Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class HighCharts extends Widget implements iWidget
{
	public function run()
	{
		if(!isset($this->htmlOptions['style']))
			$this->htmlOptions['style']="min-width: 400px; height: 400px; margin: 0 auto";
			
		parent::init();
		
		if(!isset($this->options['chart']) || !isset($this->options['chart']['renderTo']))
		{
			echo Html::tag('div',$this->htmlOptions,'',true);

			if (isset($this->options['chart']) && is_array($this->options['chart']))
				$this->options['chart']['renderTo'] = $this->getId();
			else
				$this->options['chart'] = array('renderTo' => $this->getId());
		}
		
		$this->registerClientScript();
	}
	
	public function registerClientScript()
	{
		$defaultOptions = array('exporting' => array('enabled' => true));
		$this->options = array_merge($defaultOptions, $this->options);
		
		Html::registerScriptFileBottom($this->coreAssets . '/highcharts/highcharts.js');
		
		if (isset($this->options['exporting']) && @$this->options['exporting']['enabled'])
			Html::registerScriptFileBottom($this->coreAssets.'/highcharts/modules/exporting.js');
		if (isset($this->options['theme']))
			Html::registerScriptFileBottom($this->coreAssets.'/highcharts/themes/' . $this->options['theme'] . '.js');
		
		
		$options=$this->javaScriptEncode($this->options);
		Html::registerScriptBottom("var highchart{$this->getId()} = new Highcharts.Chart({$options});");
	}
}
