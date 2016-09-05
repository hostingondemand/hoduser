<?php
namespace modules\maxuser\service;
    use lib\service\BaseService;

    class User extends  BaseService{
        function getAccountForLogin($username,$password){
            $result= $this->db->query("select * from user where username='".$username."' && password='".md5($password)."'")->fetchModel("user");

            if($result){
                $result->newHash();
                $this->db->saveModel($result,"user");
            }

            return $result;
        }

        function getUserByHash($hash){
            $query= $this->db->query("select * from user where hash='".$hash."'");
            if($query && $query->result) {
                $result = $query->fetchModel("user");
                return $result;
            }
            return 0;
        }

        function getLevel($id,$type,$key){
            $query=false;

            if($id){
                $query=$this->db->query("select max(uga.level) as level from user as u
                    left join user_group as ug on ug.id=u.user_group_id
                    left join user_group_access as uga on uga.user_group_id=ug.id
                    where
                    u.id='".$id."'
                    and (uga.`type`='".$type."' or uga.`type`='*')
                    and (uga.`key`='".$key."' or uga.`key`='*');

                ");
            }else{
                $query=$this->db->query("select max(uga.level) as level from  user_group as ug
                    left join user_group_access as uga on uga.user_group_id=ug.id
                    where
                    ug.is_guest='1'
                    and (uga.`type`='".$type."' or uga.`type`='*')
                    and (uga.`key`='".$key."' or uga.`type`='*')");
            }

            if($query && $query->numRows()){
                $fetch = $query->fetch();
                if(!$fetch["level"]){
                    $fetch["level"]=0;
                }
                return $fetch["level"];
            }

            return 0;

        }
    }
?>