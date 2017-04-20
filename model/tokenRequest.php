<?php
namespace modules\hoduser\model;

use hodphp\lib\model\BaseModel;

class TokenRequest extends BaseModel
{
    var $apiKey;

    function getToken()
    {
        $key=$this->service->apikey->getByKey($this->apiKey);
        if($key){
            $token=$key->requestToken();
            if($token){
                $this->service->apikey->save($key);
                return $this->model->tokenResponse->initialize($token,true,"success");
            }
        }

        return $this->model->tokenResponse->initialize("",false,"Token request failed");

    }

}

?>