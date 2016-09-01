<?php
namespace modules\maxuser\service;
    use lib\service\BaseService;

    class User extends  BaseService{
        function getAccountForLogin($username,$password){
            $result= $this->db->query("select * from user where username='".$username."' && password='".md5($password)."'")->fetchModel("user");

            if($result){
                $result->newHash();
                $this->db->saveModel($result,"user");
            }

            return $result;
        }

        function getUserByHash($hash){
            $result= $this->db->query("select * from user where hash='".$hash."'")->fetchModel("user");
            return $result;
        }
    }
?>