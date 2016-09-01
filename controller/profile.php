<?php
namespace modules\maxuser\controller;

use core\Controller;

class Profile extends Controller
{
    function home()
    {
       $model=$this->model->profile->initialize();
       $this->response->renderView($model);
    }


}

?>