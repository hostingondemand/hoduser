<?php namespace modules\hoduser\patch;
    use hodphp\lib\patch\BasePatch;

    class ApiKey extends BasePatch{

        function patch()
        {

            $this->patch->table("apikey")
                ->addField("name", "varchar(50)")
                ->addField("host", "varchar(50)")
                ->addField("key", "varchar(100)")->addIndex("key")
                ->addField("token","varchar(100)")->addIndex("token")
                ->addField("lastTokenDate","int")
                ->addField("user_id", "int")->addIndex("user_id")
                ->create();


            return true;
        }
    }
?>