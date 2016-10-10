<?php
namespace modules\hoduser\patch;
    use modules\hodpatch\lib\patch\BasePatch;

    class Install extends BasePatch{

        function patch()
        {
            $this->patch->table("user")
                ->addField("username","varchar(50)")->addIndex("username")
                ->addField("password","varchar(50)")
                ->addField("hash","varchar(100)")
                ->addField("user_group_id","int")->addIndex("group_id")
                ->addField("lastLogin","int")
            ->create();

            $this->patch->table("user_group")
                ->addField("name","varchar(50)")
                ->create();

            $this->patch->table("user_group_access")
                ->addField("level","int")
                ->addField("type","varchar(50)")->addIndex("type")
                ->addField("key","varchar(50)")->addIndex("key")
                ->addField("user_group_id","int")->addIndex("group_id")
                ->create();

            return true;
        }
    }
?>