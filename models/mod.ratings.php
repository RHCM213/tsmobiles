<?php
require_once("models/mod.dbase.php");

class Ratings extends Dbase {
    
    public function getRating($mobile_id) {
        $query = $this->db->prepare("
            SELECT mobile_id, rating
            FROM ratings
            WHERE mobile_id = ? AND user_id = ?
        ");

        $query->execute([
            $mobile_id,
            $_SESSION["user_id"]
        ]);

        return $query->fetch();
    }


    
    public function createRating($mobile_id, $rating_chosen) {
        $query = $this->db->prepare("
            INSERT INTO ratings
            (mobile_id, user_id, rating)
            VALUES(?, ?, ?)   
        ");

        $query->execute([
            $mobile_id,
            $_SESSION["user_id"],
            $rating_chosen
        ]);

    }
    
    
    
    public function updateRating($mobile_id, $rating_chosen) {
        $query = $this->db->prepare("
            UPDATE ratings
            SET rating = ?
            WHERE mobile_id = ? && user_id = ? 
        ");

        $query->execute([
            $rating_chosen,
            $mobile_id,
            $_SESSION["user_id"]
        ]);

    }


}