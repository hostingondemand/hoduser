<?php
namespace modules\hoduser\provider\validator;

use hodphp\core\Loader;
use hodphp\lib\validation\BaseValidator;

class ValidPassword extends BaseValidator{

     function validate($data){
         //todo: in the future we should decide a more permanent password check. I kept it to a minimum length for now.
         if(strlen($data->data)<6){
             return $this->result(false,$this->language->get("noValidPassword","validation"));
         }else{
             return $this->result(true,false);
         }
     }
}
?>