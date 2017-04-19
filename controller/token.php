<?php
namespace modules\hoduser\controller;
use hodphp\core\Controller;

class Token extends Controller{
    function home(){}

    /**
     * @httpPost()
     */
    function request(){
        $input=$this->model->tokenRequest->fromRequest();
        $output=$input->getToken();
        $this->response->renderJson($output);
    }

    function toUserSession($token){
        $user = $this->service->apikey->getByUserToken($token);
        if($user){
            $hash=$this->service->apikey->toUserSession($user);
            $this->session->userHash=$hash;
        }
        if($this->request->get['redirect']){
            $this->response->redirect($this->request->get['redirect']);
        }else{
            $this->response->redirect("home");
        }
    }

}
?>