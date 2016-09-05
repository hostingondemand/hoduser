<?php
namespace modules\maxuser\listener;

use lib\event\BaseListener;

class AuthorizationFail extends BaseListener
{
    function handle($data){
        $this->response->redirect("maxuser","login");
    }
}

?>