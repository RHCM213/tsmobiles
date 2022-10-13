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
            SELECT mobile_id, mobile_img, mobile_name, unit_sold, 
            is_smartphone, released_date, size, weight, display_resolution, display_inches, 
            platform, is_dualsim, has_cardslot, memory_rom_ram, camera, video, has_bluetooth, 
            battery, avg_rating
            FROM mobiles
            WHERE mobile_id = ?         
        ");

        $query->execute([ $id ]);

        return $query->fetch();

    }

}