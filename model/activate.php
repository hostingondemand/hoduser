<?php
namespace modules\hoduser\model;

use lib\model\BaseModel;

class Activate extends BaseModel
{
    var $code;
    var $user;

    function initialize($code)
    {
        $this->code = $code;
        return $this;
    }

    function activate()
    {
        $this->user = $this->service->user->getByActivationCode($this->code);
        return $this->service->user->activateByCode($this->code);
    }

    function login()
    {
        if ($this->user) {
            $this->service->user->createSessionForUser($this->user);
             $this->session->userHash = $this->user->hash;
        }
    }

}

?>
