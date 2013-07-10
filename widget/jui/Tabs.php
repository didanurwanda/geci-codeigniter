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
 * @class			Tabs
 * @peckage			Jui Widget
 * @subpeckage		Jui Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

namespace GeCi\widget\jui;

use \GeCi\component\Html;
use \GeCi\component\JavaScript;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class Tabs extends Widget implements iWidget
{
	public $tagName='div';
	public $tabs=array();
	public $headerTemplate='<li><a href="{url}" title="{id}">{title}</a></li>';
	public $contentTemplate='<div id="{id}">{content}</div>';
	public $sortable=false;
	public $sortableOptions=array();
	
	public function run()
	{		
		parent::init();
		echo Html::openTag($this->tagName,$this->htmlOptions);
		
		$tabsOut='';
		$contentOut='';
		$tabCount=0;
		
		foreach($this->tabs as $title=>$content)
		{
			$id=$this->getId();
			
			$tabId = (is_array($content) && isset($content['id']))?$content['id']:$id.'_tab_'.$tabCount++;

			if (!is_array($content))
			{
				$tabsOut .= strtr($this->headerTemplate, array('{title}'=>$title, '{url}'=>'#'.$tabId, '{id}'=>$title))."\n";
				$contentOut .= strtr($this->contentTemplate, array('{content}'=>$content,'{id}'=>$tabId))."\n";
			}
			else
			{
				$tabsOut .= strtr($this->headerTemplate, array('{title}'=>$title, '{url}'=>'#'.$tabId, '{id}'=>$title))."\n";
				if(isset($content['content']))
					$contentOut .= strtr($this->contentTemplate, array('{content}'=>$content['content'],'{id}'=>$tabId))."\n";
			}
		}
		echo "<ul>\n" . $tabsOut . "</ul>\n";
		echo $contentOut;

		echo Html::closeTag($this->tagName)."\n";
		
		if($this->sortable)
			Html::registerScriptBottom("jQuery('#". $this->getId() ."').tabs(". JavaScript::encode($this->options) .").find( '.ui-tabs-nav' ).sortable(". JavaScript::encode($this->sortableOptions) .");"); 
		else
			$this->jQueryScript('tabs');

	}
}