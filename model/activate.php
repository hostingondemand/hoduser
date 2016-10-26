<?php
namespace modules\hoduser\model;

use lib\model\BaseModel;

class Activate extends BaseModel
{
    var $code;

    function initialize($code){
      $this->code=$code;
        return $this;
    }

    function activate(){
       return $this->service->user->activateByCode($this->code);
    }

}

?>
