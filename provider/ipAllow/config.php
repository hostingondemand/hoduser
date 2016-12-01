<?php
    namespace modules\hoduser\provider\ipAllow;
    use modules\hoduser\lib\BaseIpAllowProvider;

    class Config extends  BaseIpAllowProvider{

        function isAllowed($ip,$parameters)
        {
            if(isset($parameters["section"])){
                $section=$parameters["section"];
            }else{
                $section="website";
            }

            $config=$this->config->get("ipAllow.".$section,"access");
            if(is_array($config)){
               $success= @$config[$ip]?:false;
               $user = @$parameters["user"]?:false;

               return array("success"=>$success,"user"=>$user);
            }

            return false;

        }
    }
?>