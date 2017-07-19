<?php
namespace modules\hoduser\patch;
    use hodphp\lib\patch\BasePatch;

    class ResetPassword extends BasePatch{

        function patch()
        {
            $this->patch->table("user")
                ->addField("resetCode","varchar(250)")
                ->update();

            return true;
        }
    }
?>
