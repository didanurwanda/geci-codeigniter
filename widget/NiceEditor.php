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
 * @class			NiceEditor
 * @peckage			Widget
 * @subpeckage		Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

namespace GeCi\widget;

use \GeCi\component\Html;
use \GeCi\widget\Widget;
use \GeCi\widget\iWidget;

class NiceEditor extends Widget implements iWidget
{
	public $name;
	public $width='100%';
	public $height='150px';
	
	public function run()
	{
		parent::init();
		
		if (!array_key_exists('style', $this->htmlOptions))
            $this->htmlOptions['style'] = "width:{$this->width};height:{$this->height};";
        
		if($this->name!=='')
			$this->htmlOptions['name']=$this->name;
		
		Html::registerScriptFileBottom($this->coreAssets.'/nicEdit/nicEdit.js');
			
		$options=array_merge(array('iconsPath'=>$this->coreAssets.'/nicEdit/nicEditorIcons.gif'),$this->options);
		Html::registerScriptBottom("new nicEditor(". $this->javaScriptEncode($options) .").panelInstance('".$this->getId()."');"); 
		
		echo Html::textArea($this->htmlOptions);
	}	
}
