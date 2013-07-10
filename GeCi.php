<?php

require_once dirname(__FILE__).'/Base.php';

class GeCi extends \GeCi\Base
{
}

spl_autoload_register(array('GeCi','autoload'));