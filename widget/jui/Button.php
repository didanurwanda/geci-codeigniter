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
 * @class			Button
 * @peckage			Jui Widget
 * @subpeckage		Jui Widget
 * @category		Widget
 * @author			Dida Nurwanda
 */

namespace GeCi\widget\jui;

use \GeCi\component\Html;
use \GeCi\widget\jui\Widget;
use \GeCi\widget\iWidget;

class Button extends Widget implements iWidget
{
	public $buttonType='submit';
	public $url;
	public $label;
	public $buttonList=array();	
	public static $rid=1;
	public static $cid=1;
	
	public function run()
	{		
		parent::init();
		
		switch($this->buttonType)
		{
			case 'submit':
				$this->htmlOptions['value'] = $this->label;
				echo Html::submitButton($this->htmlOptions);
			break;
			
			case 'button':
				$this->htmlOptions['content'] = $this->label;
				echo Html::button($this->htmlOptions);
			break;
			
			case 'link':
				echo Html::link($this->url,$this->label,$this->htmlOptions);
			break;
				
			case 'radio':
				echo Html::openTag('div',$this->htmlOptions); 
					foreach($this->buttonList as $key=>$val)
					{
						$val['id']=$this->getId().'_radio_'.self::$rid++;
						echo Html::radioButton($val) . form_label($val['label'],$val['id']);
					}
				echo Html::closeTag('div');
			break;
				
			case 'checkbox':
				echo Html::openTag('div',$this->htmlOptions); 
					$this->jButtonSet();
					$newId=$this->getNewId();
					foreach($this->buttonList as $key=>$val)
					{
						$val['id']=$newId.'_checkbox_'.self::$cid++;
						echo Html::checkBox($val) . form_label($val['label'],$val['id']);
					}
				echo Html::closeTag('div');
			break;
		}
		
		if($this->buttonType!=='radio')
			$this->jButton();
		elseif($this->buttonType=='checkbox')
			$this->jQueryScript('button',$this->getNewId());
		else
			$this->jButtonSet();
			
	}
	
	/**
	 * Script single button
	 *
	 * @access		public
	 * @return		void
	 */
	public function jButton()
	{
		$this->jQueryScript('button');
	}
	
	/**
	 * Script multi button
	 *
	 * @access		public
	 * @return		void
	 */
	public function jButtonSet()
	{
		$this->jQueryScript('buttonset');
	}
}