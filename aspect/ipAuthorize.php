<?php
namespace modules\hoduser\aspect;

use framework\lib\annotation\baseAspect;

class IpAuthorize extends BaseAspect
{
    var $init;
    function onMethodPreCall($parameters, $data)
    {
        if (isset($parameters["provider"])) {
            $provider = $parameters["provider"];
        } else {
            $provider = "config";
        }

        $result = $this->provider->ipAllow->$provider->isAllowed($this->request->getIp(), $parameters);
        if ($result === true || @$result["success"]) {
            if (isset($result["user"])) {
                $user = $this->service->user->getUserByName($result["user"]);
                $this->auth->setUser($user);
            }
            $this->init = true;
        } else {
            $this->event->raise("authorizationFail", array("parameters" => $parameters, "data" => $data));
        }
    }
}

?>