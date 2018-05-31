<?php
namespace modules\hoduser\lib;
use framework\core\Lib;

abstract class BaseIpAllowProvider extends Lib
{
    abstract function isAllowed($ip,$parameters);
}