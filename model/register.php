<?php
namespace modules\hoduser\model;

use framework\lib\model\BaseModel;

class Register extends BaseModel
{
    /**
     * @validateValidUsername()
     */
    var $username;
    /**
     * @validateValidPassword()
     */
    var $password;
    /**
     * @validateEquals(compareTo=>password)
     */
    var $rePassword;
    /**
     * @validatevalidEmail()
     */
    var $email;

    function doRegister(){
       return $this->service->user->register($this);
    }


}

?>
