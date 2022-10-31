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


    
    public function createRating($mobile_id, $rating) {
        $query = $this->db->prepare("
            INSERT INTO ratings
            (mobile_id, user_id, rating)
            VALUES(?, ?, ?)   
        ");

        $query->execute([
            $mobile_id,
            $_SESSION["user_id"],
            $rating
        ]);

    }

}