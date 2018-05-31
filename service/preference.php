<?php
namespace modules\hoduser\service;
use framework\lib\service\BaseService;

class Preference extends BaseService
{
    function getPreferenceByKey($user, $key)
    {
        return $this->db->select("userPreference")
            ->where("user_id='" . $user . "'")
            ->fetchModel("preference");
    }

    function savePreference($user,$key,$value){
        $preference=$this->getPreferenceByKey($user,$key);
        if(!$preference){
            $preference=$this->model->preference;
            $preference->user_id=$user;
            $preference->key=$key;
        }
        $preference->value=$value;
        $this->db->saveModel($preference,"userPreference");
    }
}
?>
