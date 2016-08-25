<?php
namespace modules\maxuser\controller;

use core\Controller;

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

        }else{

        }
    }
}

?>
