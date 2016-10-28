<?php
namespace modules\hoduser\patch;
    use modules\hodpatch\lib\patch\BasePatch;

    class Activation extends BasePatch{

        function patch()
        {
            $this->patch->table("user")
                ->addField("activation","varchar(250)")
                ->addField("email","varchar(250)")
                ->update();

            return true;
        }
    }
?>