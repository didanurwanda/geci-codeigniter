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
 * @class			FlowPlayer
 * @peckage			Widget
 * @subpeckage		Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class FlowPlayer extends Widget implements iWidget
{
	public $video;
	
	public function run()
	{
		if(!isset($this->htmlOptions['style']))	
			$this->htmlOptions['style']='display:block;width:520px;height:330px';
			
		parent::init();
		
		echo Html::link($this->video,'',$this->htmlOptions);
		
		$fp=$this->coreAssets . '/flowplayer/flowplayer-3.2.10.swf';
		
		Html::registerScriptBottom("flowplayer('{$this->getId()}','{$fp}');");
		Html::registerScriptFileBottom($this->coreAssets . '/flowplayer/flowplayer-3.2.9.min.js');
	}
}
