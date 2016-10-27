<?php
namespace modules\hoduser\model;

use lib\model\BaseModel;

class User extends BaseModel
{
    var $username;
    var $password;
    var $hash;
    var $userGroup;
    var $email;
    var $activation;

    function newHash(){
        $this->hash= md5($this->username.time()).md5(microtime().rand(0,100000));
    }

    function fromRegistrationForm($form){
        $this->username=$form->username;
        $this->changePassword($form->password);
        $this->email=$form->email;
        $this->userGroup=$this->service->user->getDefaultGroup();
        return $this;
    }

    function makeInactive(){
        $this->activation=md5(time().$this->password).md5($this->username.time());
    }

    function activate(){
        $this->activation=0;
    }

    function changePassword($password){
        if($password){
            $this->password=md5($password);
        }
    }

    function __fieldHandlers(){
        return array(
            "userGroup"=>$this->model->fieldHandler("dbReference")
                ->field("user_group_id")
                ->toTable("user_group")
                ->fromTable("user")
                ->toModel("userGroup")
                ->updateReference()
        );
    }
}

?>
