<?php
namespace modules\hoduser\controller;

use hodphp\core\Controller;

class Profile extends Controller
{
    function home()
    {
       $model=$this->model->profile->initialize();
       $this->response->renderView($model);
    }


}

?>