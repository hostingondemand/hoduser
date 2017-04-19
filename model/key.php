<?php
    namespace modules\hoduser\model;
    use hodphp\lib\model\BaseModel;

    class Key extends BaseModel{
        var $name;
        var $host;
        var $key;
        var $token;
        var $user_id;
        var $lastTokenDate;

        function requestToken(){
            if($this->isValid()) {
                $this->lastTokenDate = time();
                $this->token = md5(time() . $this->key) . md5(time() . $this->host);
                return $this->token;
            }
            return false;
        }

        function isValid(){
            return $this->host && gethostbyname($this->host)==$_SERVER['REMOTE_ADDR'];
        }


        function __fieldHandlers(){
            return array(
                "user"=>$this->model->fieldHandler("dbReference")->field("user_id")->toTable("user")->toModel("user")
            );
        }


    }
?>