<?php
namespace modules\hoduser\patch;
    use framework\lib\patch\BasePatch;

    class UserPreference extends BasePatch{

        function patch()
        {
            $this->patch->table("userPreference")
                ->addField("user_id","int")->addIndex("user_id")
                ->addField("key","varchar(50)")->addIndex("key")
                ->addField("value","varchar(250)")
                ->save();

            return true;
        }
    }
?>
