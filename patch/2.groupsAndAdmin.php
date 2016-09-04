<?php
namespace modules\maxuser\patch;
    use modules\maxpatch\lib\patch\BasePatch;

    class GroupsAndAdmin extends BasePatch{

        function patch()
        {

            $this->patch->table("user_group")
                ->addField("is_default","int")
                ->addField("is_guest",int)
                ->update()
            ;

            $this->db->query(
                "insert into user_group
                  set name='guest',
                  is_default=0,
                  is_guest=1
                 "
            );

            $this->db->query(
                "insert into user_group
                  set name='user',
                  is_default=1,
                  is_guest=0
                 "
            );

            $this->db->query(
                "insert into user_group
                  set name='admin',
                  is_default=0,
                  is_guest=0
                 "
            );
            $id=$this->db->lastId();

            $this->db->query("
                insert into user
                set username='admin',
                password='".md5("admin")."',
                user_group_id='".$id."'
            ");


            return true;
        }
    }
?>