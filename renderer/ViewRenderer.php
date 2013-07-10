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
 * @class			ViewRenderer
 * @peckage			Renderer
 * @subpeckage		Component
 * @category		Component
 * @author			Dida Nurwanda
 */

namespace GeCi\renderer;

use \GeCi\component\Component;

class ViewRenderer extends Component
{
	public static $layouts='layouts/main';
	public static $column='layout/column1';
	public static $path;
	public static $data;
	public static $condition=false;
	
	public function renderPartial($path = '', $data = '', $condition = false)
	{
		self::checkFile($path);
		parent::app()->load->view($path, $data, $condition);
	}
	
	public function render($path = '', $data = '', $condition = false)
	{
		self::checkFile($path);		
		self::$path=$path; self::$data=$data; self::$condition=$condition;
		self::renderPartial(self::$layouts, self::$data, self::$condition);
	}
	
	public function column()
	{
		self::renderPartial(self::$path, self::$data);
	}
	
	public function content()
	{
		self::renderPartial(self::$path, self::$data);
	}
	
	protected function checkFile($path)
	{
		if(!file_exists(APPPATH.'views/'.$path.EXT))
			show_error("Unable to load the requested file: ".APPPATH.'views/'.$path.EXT);
	}
}