<?php
namespace modules\hoduser\provider\validator;

use framework\core\Loader;
use framework\lib\validation\BaseValidator;

class ValidUsername extends BaseValidator{

     function validate($data){
         //todo: in the future we should decide a more permanent password check. I kept it to a minimum length for now.
         if(@!$data->data){
             return $this->result(false,$this->language->get("empty","_validation"));
         }else {
             $user = $this->service->user->getUserByName($data->data);
             if ($user) {
                 return $this->result(false,$this->language->get("userExists","validation"));
             }
         }
         return $this->result(true,false);
     }
}
?>