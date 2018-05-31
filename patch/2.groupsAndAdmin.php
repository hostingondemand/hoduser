<?php
namespace modules\hoduser\patch;
    use framework\lib\patch\BasePatch;

    class GroupsAndAdmin extends BasePatch{

        function patch()
        {

            $this->patch->table("user_group")
                ->addField("is_default","int")
                ->addField("is_guest","int")
                ->update()
            ;

            $this->db->query(
                "insert into ".$this->db->getPrefix()."user_group
                  set name='guest',
                  is_default=0,
                  is_guest=1
                 "
            );

            $this->db->query(
                "insert into ".$this->db->getPrefix()."user_group
                  set name='user',
                  is_default=1,
                  is_guest=0
                 "
            );

            $id=$this->db->lastId();
            $this->db->query("
                insert into ".$this->db->getPrefix()."user_group_access
                set `level`='1',
                 `type`='*',
                 `key`='*',
                 `user_group_id`='".$id."'
            ");

            $this->db->query("
                insert into ".$this->db->getPrefix()."user
                set username='user',
                password='".md5("user")."',
                user_group_id='".$id."'
            ");


            $this->db->query(
                "insert into ".$this->db->getPrefix()."user_group
                  set name='admin',
                  is_default=0,
                  is_guest=0
                 "
            );
            $id=$this->db->lastId();

            $this->db->query("
                insert into ".$this->db->getPrefix()."user
                set username='admin',
                password='".md5("admin")."',
                user_group_id='".$id."'
            ");


            $this->db->query("
                insert into ".$this->db->getPrefix()."user_group_access
                set `level`='4',
                 `type`='*',
                 `key`='*',
                 `user_group_id`='".$id."'
            ");

            return true;
        }
    }
?>
