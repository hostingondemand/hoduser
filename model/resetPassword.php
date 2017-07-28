<?php

?><?php
namespace modules\hoduser\model;

use hodphp\lib\model\BaseModel;

class ResetPassword extends BaseModel
{
    /**
     * @validateValidPassword()
     */
    var $password;
    /**
     * @validateEquals(compareTo=>password)
     */
    var $rePassword;
    var $code;


    var $message;
    var $email;

    var $success=true;
    var $showForm=true;

    function send()
    {
        if ($this->email) {
            $user = $this->service->user->getByEmail($this->email);
        } else {
            $user = $this->service->user->getUserById($this->auth->getUserId());
        }
        if ($user) {
            $this->message = $this->language->get("message.sent");
        } else {
            $this->message = $this->language->get("message.notExist");
        }

        if ($user) {
            $user->generateCode();
            $user->save();

            $this->mail->createMessage()
                ->to($user->email)
                ->view("resetPassword/linkMail", $user)
                ->subject($this->language->get("mail.resetPassword.subject"))
                ->send();
        }

        return $this;
    }

    function checkCode($code=false)
    {
        if($code) {
            $this->code = $code;
        }else{
            $code=$this->code;
        }

        if($this->code) {
            $user = $this->service->user->getByResetCode($code);
            $result = false;
            if ($user) {
                $result = $user->checkCode();
                if ($result) {
                    $this->message = $this->language->get("message.code.correct");
                    $this->success = true;
                } else {
                    $this->message = $this->language->get("message.code.incorrect");
                    $this->success = false;
                    $this->showForm = false;
                }
            }
        }else{
            $this->success = false;
            $this->showForm = false;
        }
        return $result;
    }

    function doReset(){
        $user = $this->service->user->getByResetCode($this->code);
        if($this->checkCode()&&$user  && $this->isValid()){
            $user->changePassword($this->password);
            $user->resetCode=0;
            $user->save();
            $this->message = $this->language->get("message.success");
            $this->success=true;
        }else{
            $this->success=false;
        }
    }
}