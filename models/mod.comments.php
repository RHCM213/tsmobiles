<?php
require_once("models/mod.dbase.php");
    
    class Comments extends Dbase {
        


        public function getComments($mobile_id) {
            $query= $this-> db ->prepare("
            SELECT comment_id, user_photo, user_name, comment_txt, comment_date, reply_to
            FROM comments
            INNER JOIN users USING (user_id)
            WHERE mobile_id = ?
            ORDER BY reply_to, comment_id           
            ");
    
            $query->execute([
                $mobile_id
            ]);
            
            return $query->fetchAll();

        }
        


        public function createComment($data, $mobile_id){
            $query = $this-> db->prepare("
                INSERT INTO comments
                (comment_txt, user_id, mobile_id)
                VALUES(?, ?, ?)
            ");

            $query->execute([
                $data["txt_comment"],
                $_SESSION["user_id"],
                $mobile_id             
            ]);
        }


        

        public function createReply($data, $mobile_id){
            $query = $this-> db->prepare("
                INSERT INTO comments
                (comment_txt, user_id, mobile_id, reply_to)
                VALUES(?, ?, ?, ?)
            ");

            $query->execute([
                $data["txt_reply"],
                $_SESSION["user_id"],
                $mobile_id,
                $data["comment_id"]            
            ]);
        }



        public function getAdminComments(){
            $query= $this-> db ->prepare("
                SELECT comment_id, user_name, comment_date, comment_txt
                FROM comments
                INNER JOIN users USING (user_id)
                ORDER BY user_name, comment_date
            ");
    
            $query->execute();
            
            return $query->fetchAll();
    
        }





    }



    
