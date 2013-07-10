<?php 

namespace GeCi\component\base;

class Url extends \GeCi\component\Component
{
	public function ActiveUrl()
	{
		$pageUrl='http';
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on')
			$pageUrl.='s';
		$pageUrl.='://';
		if($_SERVER['SERVER_PORT']!='80')
			$pageUrl.=$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
		else
			$pageUrl.=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		return $pageUrl;
	}
	
	public function curentUrl()
	{
		return current_url();
	}
}