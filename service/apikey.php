<?php
    namespace modules\hoduser\service;
    use lib\service\BaseService;

    class Apikey extends BaseService{

        function getByUserToken($token){
            $key= $this->db->select("apikey")
                ->ignoreParent()
                ->where("`token`='".$token."'")->fetchModel("key");

            if($key && $key->isValid()){
                return $key->user;
            }

            return false;
        }

        function getByKey($key){
            return $this->db->select("apikey")
                ->ignoreParent()
                ->where("`key`='".$key."'")->fetchModel("key");
        }

        function save($key){
            $this->db->saveModel($key,"apikey",true);
        }

        function toUserSession($user){
            if($user){
                $user->newHash();
                $this->db->saveModel($user,"user");
                return $user->hash;
            }
            return false;
        }
    }
?>