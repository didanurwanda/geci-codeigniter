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
 * @class			Url
 * @peckage			Component
 * @subpeckage		Component
 * @category		Component
 * @author			Dida Nurwanda
 */

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