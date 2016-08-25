<?php
namespace modules\maxuser\controller;

use lib\model\BaseModel;

class Login extends BaseModel
{
    var $username;
    var $password;

    function tryLogin(){
        $account = $this->service->user->getAccountForLogin($this->username,$this->password);
    }
}

?>
