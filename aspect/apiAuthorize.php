<?php
    namespace modules\hoduser\aspect;
    use hodphp\lib\annotation\baseAspect;

    class ApiAuthorize extends BaseAspect{
        var $init;
        function onMethodPreCall($parameters, $data)
        {
                if(!$this->init) {
                    $token=$this->request->getHeaderByName("token");
                    $user = $this->service->apikey->getByUserToken($token);
                    $this->auth->setUser($user);
                    $this->init=true;
                }

                if(!$this->auth->isAuthorized("attribute",$parameters[0],isset($parameters[1])?$parameters[1]:1)){
                    $this->event->raise("authorizationFail",array("parameters"=>$parameters,"data"=>$data));
                }
        }
    }

?>