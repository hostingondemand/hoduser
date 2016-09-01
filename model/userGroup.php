<?php
namespace modules\maxuser\model;

use lib\model\BaseModel;

class UserGroup extends BaseModel
{
    var $name;
    var $access;


    function newHash(){
        $this->hash= md5($this->username.time()).md5(microtime().rand(0,100000));
    }

    function __fieldHandlers(){
        return array(
            "access"=>$this->model->fieldHandler("dbToMany")->field("user_group_id")->toTable("user_group_access")->toModel("userGroupAccess")
        );
    }


}

?>
