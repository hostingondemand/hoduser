<?php
namespace modules\hoduser\model;

use hodphp\lib\model\BaseModel;

class Profile extends BaseModel
{
    var $userName;
    var $groupName;
    var $access;

    function initialize()
    {
        $user = $this->service->user->getUserByHash($this->session->userHash);
        $this->userName = $user->username;
        $this->groupName = $user->userGroup->name;
        $this->access = $user->userGroup->access;

        return $this;
    }

}

?>
