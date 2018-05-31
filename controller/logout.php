<?php
namespace modules\hoduser\controller;

use framework\core\Controller;

class Logout extends Controller
{
    function home()
    {
        $this->service->user->logout($this->auth->getUserId());
        $this->response->redirect("","login");
    }

}

?>
