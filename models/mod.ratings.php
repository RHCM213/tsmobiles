<?php
require_once("models/mod.dbase.php");

class Ratings extends Dbase {
    
    public function getrating() {
        $query = $this->db->prepare("
            SELECT mobile_id, user_id, rating
            FROM ratings
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function create($data) {
        $query = $this->db->prepare("
            INSERT INTO ratings
            (mobile_id, user_id, rating)
            VALUES(?, ?, ?)   
        ");

        $query->execute([
            $data["rating"],
            $data["rating"],
            $data["rating"]]);

        return $query->fetchAll();
    }

}