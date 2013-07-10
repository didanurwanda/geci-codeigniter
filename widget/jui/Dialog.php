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
 * @class			Dialog
 * @peckage			Jui Widget
 * @subpeckage		Jui Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

namespace GeCi\widget\jui;

use \GeCi\component\Html;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class Dialog extends Widget implements iWidget
{
	public $title;
	public $content;
	public $tagName='div';
	
	public function init()
	{
		parent::init();
		
		if(!isset($this->htmlOptions['title']))
			$this->htmlOptions['title']=$this->title;
			
		echo Html::openTag($this->tagName, $this->htmlOptions);
		echo $this->content;
	}
	
	public function run()
	{
		echo Html::closeTag($this->tagName);
		$this->jQueryScript('dialog');
	}
}