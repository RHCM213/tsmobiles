<?php
require_once("models/mod.dbase.php");

class Mobiles extends Dbase {
    
    public function getmobiles() {
        $query = $this->db->prepare("
            SELECT mobile_id, mobile_name, released_date, unit_sold, avg_rating
            FROM mobiles
            ORDER BY unit_sold DESC
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function getmobile($id) {
        $query = $this->db->prepare("
            SELECT *
            FROM mobiles
            WHERE mobile_id = ?         
        ");

        $query->execute([ $id ]);

        return $query->fetch();

    }

}
