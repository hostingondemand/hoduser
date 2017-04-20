<?php
namespace modules\hoduser\model;
use hodphp\lib\model\BaseModel;

class TokenResponse extends  BaseModel{
    var $success;
    var $message;
    var $token;
    function initialize($token,$success,$message){
        $this->token=$token;
        $this->success=$success;
        $this->message=$message;
        return $this;
    }
}
?>