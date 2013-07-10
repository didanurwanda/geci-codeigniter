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
 * @class			GeCi
 * @peckage			GeCi
 * @subpeckage		Base
 * @category		Base Library
 * @author			Dida Nurwanda
 */
 
require_once dirname(__FILE__).'/Base.php';

class GeCi extends \GeCi\Base
{
}

spl_autoload_register(array('GeCi','autoload'));