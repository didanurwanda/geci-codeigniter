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
 * @class			Accordion
 * @peckage			Jui Widget
 * @subpeckage		Jui Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

namespace GeCi\widget\jui;

use \GeCi\component\Html;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class Accordion extends Widget implements iWidget
{
	public $panels=array();
	public $headerTemplate='<h3><a href="#">{title}</a></h3>';
	public $tagName='div';
	public $contentTemplate='<div>{content}</div>';
	
	public function run()
	{	
		parent::init();
		
		echo Html::openTag($this->tagName,$this->htmlOptions);
		foreach($this->panels as $key=>$val)
		{
			echo strtr($this->headerTemplate,array('{title}'=>$key));
			echo strtr($this->contentTemplate,array('{content}'=>$val));
		}
		
		echo Html::closeTag($this->tagName);
		$this->jQueryScript('accordion');
	}
}