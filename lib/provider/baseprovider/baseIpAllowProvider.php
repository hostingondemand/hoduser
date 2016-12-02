<?php
namespace modules\hoduser\lib;
use core\Lib;

abstract class BaseIpAllowProvider extends Lib
{
    abstract function isAllowed($ip,$parameters);
}