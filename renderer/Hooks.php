<?php

namespace GeCi\renderer;

use \GeCi\component\Component;
use \GeCi\component\Html;

class Hooks extends Component
{
	const SCRIPT_OPEN = "<script type=\"text/javascript\">\n/*<![CDATA[*/\njQuery(function(){";
	const SCRIPT_CLOSE = "\n});\n/*]]>*/\n</script>";
	const STYLE_OPEN = "\t<style type=\"text/css\">";
	const STYLE_CLOSE = "\t\n</style>";
	const N = "\n";
	const T = "\t";
	
	public function execute()
	{
		$CI=Component::app();
		
		$buffer=$CI->output->get_output();
		
		$buffer = str_replace(
			"</title>",
			"</title>".
			Hooks::N.
			$this->__meta().$this->__styleFileTop().$this->__scriptFileTop().$this->__styleTop().$this->__scriptTop(),
			$buffer
		);
		
		$buffer = str_replace(
			"</body>",
			$this->__styleFileBottom().$this->__scriptFileBottom().$this->__styleBottom().$this->__scriptBottom().Hooks::N ."</body>",
			$buffer
		);
		
		$CI->output->set_output($buffer);
		$CI->output->_display();
	}
	
	public function __meta()
	{
		$meta = isset(Html::$meta) ? Html::$meta : array();
		$scr='';
		foreach(array_unique($meta) as $key=>$val)
		{
			$scr.=Hooks::N . Hooks::T . $val;
		}
		return $scr;
	}
	
	public function __scriptTop()
	{
		$script=isset(Html::$scriptTop) ? Html::$scriptTop : array();
		if(count($script)>0)
		{
			$scr=Hooks::SCRIPT_OPEN;
			foreach(array_unique($script) as $key=>$val)
			{
				$scr.=Hooks::N . $val;
			}
			$scr.=Hooks::N . Hooks::SCRIPT_CLOSE;
		}
		else
		{
			$scr='';
		}
		return $scr;
	}
	
	public function __scriptFileTop()
	{
		$script=isset(Html::$scriptFileTop) ? Html::$scriptFileTop : array();
		$scr='';
		foreach(array_unique($script) as $key=>$val)
		{
			$scr.=$val . Hooks::N;
		}	
		return $scr;
	}
	
	public function __styleTop()
	{
		$style=isset(Html::$styleTop) ? Html::$styleTop : array();
		if(count($style)>0)
		{
			$scr=Hooks::STYLE_OPEN;
			foreach(array_unique($style) as $key=>$val)	
			{
				$scr.=Hooks::N . Hooks::T . $val;
			}
			$scr.=Hooks::STYLE_CLOSE;
		}
		else
		{
			$scr='';
		}
		return $scr;
	}
	
	public function __styleFileTop()
	{
		$style=isset(Html::$styleFileTop) ? Html::$styleFileTop : array();
		$scr="";
		foreach(array_unique($style) as $key=>$val)
		{
			$scr.=Hooks::T . $val . Hooks::N;
		}
		return $scr;
	}
	
	public function __scriptBottom()
	{
		$script=isset(Html::$scriptBottom) ? Html::$scriptBottom : array();
		if(count($script)>0)
		{
			$scr=Hooks::SCRIPT_OPEN;
			foreach(array_unique($script) as $key=>$val)
			{
				$scr.=Hooks::N . $val;
			}
		$scr.=Hooks::SCRIPT_CLOSE;
		}
		else
		{
			$scr='';
		}
		return $scr;
	}
	
	public function __scriptFileBottom()
	{
		$script=isset(Html::$scriptFileBottom) ? Html::$scriptFileBottom : array();
		$scr='';
		foreach(array_unique($script) as $key=>$val)
		{
			$scr.=$val . Hooks::N;
		}	
		return $scr;
	}
	
	public function __styleBottom()
	{
		$style=isset(Html::$styleBottom) ? Html::$styleBottom : array();
		if(count($style)>0)
		{
			$scr=Hooks::STYLE_OPEN;
			foreach(array_unique($style) as $key=>$val)	
			{
				$scr.=Hooks::N . $val;
			}
		}
		else
		{
			$scr='';
		}
		return $scr;
	}
	
	public function __styleFileBottom()
	{
		$style=isset(Html::$styleFileBottom) ? Html::$styleFileBottom : array();
		$scr='';
		foreach(array_unique($style) as $key=>$val)
		{
			$scr.=$val . Hooks::N;
		}
		return $scr;
	}
}