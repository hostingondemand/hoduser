<?php
namespace modules\hoduser\controller;

use hodphp\core\Controller;

class Login extends Controller
{
    function home()
    {
        $this->response->renderView();
    }


    function doLogin()
    {
        $model=$this->model->login->fromRequest();
        if($model->isValid() && $model->tryLogin()){
           return $this->response->redirect("home");
        }else{
           return $this->response->renderView($model,"login/home");
        }
    }


}

?>
