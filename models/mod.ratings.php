<?php
require_once("models/mod.dbase.php");

class Ratings extends Dbase {
    
    public function getRating($id) {
        $query = $this->db->prepare("
            SELECT mobile_id, rating
            FROM ratings
            WHERE mobile_id = ? AND user_id = ?
        ");

        $query->execute([
            $id,
            $_SESSION["user_id"]
        ]);

        return $query->fetch();
    }


    
    public function createRating($id, $rating_chosen) {
        $query = $this->db->prepare("
            INSERT INTO ratings
            (mobile_id, user_id, rating)
            VALUES(?, ?, ?)   
        ");

        $query->execute([
            $id,
            $_SESSION["user_id"],
            $rating_chosen
        ]);

    }
    
    
    
    public function updateRating($id, $rating_chosen) {
        $query = $this->db->prepare("
            UPDATE ratings
            SET rating = ?
            WHERE mobile_id = ? && user_id = ? 
        ");

        $query->execute([
            $rating_chosen,
            $id,
            $_SESSION["user_id"]
        ]);

    }



    public function avgRating($id) {
        $query = $this->db->prepare("
            SELECT ROUND(AVG(rating)) as average
            FROM ratings
            INNER JOIN mobiles USING(mobile_id)
            WHERE ? = ratings.mobile_id
            GROUP BY mobile_id     
        ");

        $query->execute([$id]);

        return $query->fetch();

    }
   






}