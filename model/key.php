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
            $remote_addr=$_SERVER["REMOTE_ADDR"];
            $ipv4=$this->helper->dns->gethostbyname($this->host);
            $ipv6=$this->helper->dns->gethostbyname6($this->host);

            $this->debug->info("Api connection", $remote_addr." - ".$ipv4." - ".$ipv6);
            return $this->host && $remote_addr==$ipv4||$remote_addr==$ipv6;
        }


        function __fieldHandlers(){
            return array(
                "user"=>$this->model->fieldHandler("dbReference")->field("user_id")->toTable("user")->toModel("user")
            );
        }


    }
?>