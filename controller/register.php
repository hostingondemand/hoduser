<?php
namespace modules\hoduser\controller;

use hodphp\core\Controller;

class Register extends Controller
{
    function home()
    {
        $this->response->renderView();
    }

    function doRegister()
    {
        $model=$this->model->register->fromRequest();
        if($model->isValid()){
            $user=$model->doRegister();
            $this->mail->createMessage()
                ->to($model->email)
                ->view("register/successMail",$user)
                ->subject($this->language->get("mail.activation.subject"))
                ->send();
            return $this->response->redirect("","","success");
        }else{
            return $this->response->renderView($model,"register/home");
        }
    }

    function success(){
        return $this->response->renderView();
    }

    function activate($code){
        $model=$this->model->activate->initialize($code);
        if($model->activate()){
            $this->message->send($this->language->get("activation.succes"),"success");
        }else{
            $this->message->send($this->language->get("activation.fail"),"warning");
        }
        $model->login();
        return $this->response->redirect(array());
    }

}

?>
