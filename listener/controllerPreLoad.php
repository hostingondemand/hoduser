<?php namespace modules\hoduser\listener;
class ControllerPreLoad extends \lib\event\BaseListener
{
    var $handled = false;

    function handle($data)
    {
        $this->template->registerGlobal("isInFakeSession",$this->auth->isInFakeSession()?"1":"0");
    }


}