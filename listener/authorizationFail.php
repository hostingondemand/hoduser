<?php
namespace modules\hoduser\listener;

use lib\event\BaseListener;

class AuthorizationFail extends BaseListener
{
    function handle($data){
        $this->response->redirect("hoduser","login");
    }
}

?>