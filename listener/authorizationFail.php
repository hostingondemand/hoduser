<?php
namespace modules\hoduser\listener;

use framework\lib\event\BaseListener;

class AuthorizationFail extends BaseListener
{
    function handle($data){
        $this->response->redirect("hoduser","login");
    }
}

?>