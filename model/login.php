<?php
namespace modules\hoduser\model;

use hodphp\lib\model\BaseModel;

class Login extends BaseModel
{
    /**
     * @validateNotEmpty()
     */
    var $username;
    /**
     * @validateNotEmpty()
     */
    var $password;

    function tryLogin(){
        $user = $this->service->user->getAccountForLogin($this->username,$this->password);
        if($user){
            $this->session->userHash=$user->hash;
        }
        return $user != null;
    }
}

?>
