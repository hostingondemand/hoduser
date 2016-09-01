<?php
    namespace modules\maxuser\lib;
    use core\Lib;

    class Auth extends Lib{

        private $user;
        function __construct()
        {
            $this->user=$this->service->user->getUserByHash($this->session->userHash);
        }

        function isAuthenticated(){
            return (bool)$this->user;
        }

        function isAuthorized($type,$key,$minLevel){
            return true;
        }
    }
?>