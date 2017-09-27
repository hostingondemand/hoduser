<?php
namespace modules\hoduser\model;

use hodphp\lib\model\BaseModel;

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
        $result= $this->service->user->activateByCode($this->code);
        if($result){
            $this->user->activation=0;
        }
        return $result;
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
