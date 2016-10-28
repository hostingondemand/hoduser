<?php
namespace modules\hoduser\model;

use lib\model\BaseModel;

class Register extends BaseModel
{
    var $username;
    var $password;
    var $rePassword;
    var $email;

    function doRegister(){
       return $this->service->user->register($this);
    }

    function __validator(){
        return $this->validation->validator("model")->
            add("username","validUsername")->
            add("password","validPassword")->
            add("email","validEmail")->
            add("rePassword","equals",array("compareTo"=>"password"));
    }



}

?>
