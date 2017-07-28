<?php
namespace modules\hoduser\controller;

use hodphp\core\Controller;

class ResetPassword extends Controller
{
    function home()
    {
        if($this->auth->getUserId()){
            $this->response->redirect("","","send");
        }
        $this->response->renderView();
    }

    function send(){
        $model=$this->model->resetPassword->fromRequest()->send();
        $this->response->renderView($model);
    }

    function form($code){
        $model=$this->model->resetPassword->fromRequest();
        $model->CheckCode($code);
        $this->response->renderView($model);
    }

    function doReset(){
        $model=$this->model->resetPassword->fromRequest();
        $model->doReset();
        if($model->success) {
            $this->response->renderView($model,"resetPassword/success");
        }else{
            $this->response->renderView($model,"resetPassword/form");
        }
    }

}

?>
