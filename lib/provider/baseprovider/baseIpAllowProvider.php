<?php
namespace modules\hoduser\lib;
use hodphp\core\Lib;

abstract class BaseIpAllowProvider extends Lib
{
    abstract function isAllowed($ip,$parameters);
}