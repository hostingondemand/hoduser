<?php
namespace modules\maxuser\model;

use lib\model\BaseModel;

class Login extends BaseModel
{
    var $username;
    var $password;

    function tryLogin(){
        $user = $this->service->user->getAccountForLogin($this->username,$this->password);
        if($user){
            $this->session->userHash=$user->hash;
        }
        return $user != null;
    }

    function __validator(){
        return $this->validation->validator("model")->
            add("username","notEmpty")->
            add("password","notEmpty");
    }



}

?>
