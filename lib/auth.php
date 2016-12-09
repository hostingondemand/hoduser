<?php
    namespace modules\hoduser\lib;
    use core\Lib;

    class Auth extends Lib{

        private $user;

        function __construct()
        {
            $this->user=$this->service->user->getUserByHash($this->session->userHash);
        }


        function getUserId(){
            if($this->user){
                return $this->user->id;
            }
            return 0;
        }
        function isAuthenticated(){
            return (bool)$this->user;
        }

        function isAuthorized($type,$key,$minLevel){

            if($this->user){
                $id=$this->user->id;
            }else{
                $id=0;
            }
            $level=$this->service->user->getLevel($id,$type,$key);
            return $level >=$minLevel;
        }

        function setUser($user){
            $this->user=$user;
        }

        function setupFakeSession($id){
            $this->session->fakeUserId=$id;
        }

        function isInFakeSession(){
            return $this->session->fakeUserId;
        }

        function stopFakeSession(){
            $this->session->fakeUserId=false;
        }
    }
?>