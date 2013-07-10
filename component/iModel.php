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
 * @interface		iModel
 * @peckage			Model
 * @subpeckage		Component
 * @category		Component
 * @author			Dida Nurwanda
 */

namespace GeCi\component;

interface iModel
{
	public $table;
	public $pk;
	
	public function __construct();
	
}