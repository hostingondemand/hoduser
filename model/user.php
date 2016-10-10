<?php
namespace modules\hoduser\model;

use lib\model\BaseModel;

class User extends BaseModel
{
    var $username;
    var $password;
    var $hash;
    var $userGroup;

    function newHash(){
        $this->hash= md5($this->username.time()).md5(microtime().rand(0,100000));
    }

    function __fieldHandlers(){
        return array(
            "userGroup"=>$this->model->fieldHandler("dbReference")->field("user_group_id")->toTable("user_group")->toModel("userGroup")
        );
    }
}

?>
