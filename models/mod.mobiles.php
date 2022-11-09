<?php
require_once("models/mod.dbase.php");

class Mobiles extends Dbase {
    
    public function getMobiles() {
        $query = $this->db->prepare("
            SELECT mobile_id, mobile_name, released_date, unit_sold
            FROM mobiles
            ORDER BY unit_sold DESC
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function getMobile($id) {
        $query = $this->db->prepare("
            SELECT mobile_id, mobile_img, mobile_name, unit_sold, 
            is_smartphone, released_date, size, weight, display_resolution, display_inches, 
            platform, is_dualsim, has_cardslot, memory_rom_ram, camera, video, has_bluetooth, 
            battery
            FROM mobiles
            WHERE mobile_id = ?         
        ");

        $query->execute([ $id ]);

        return $query->fetch();
    }


    
    public function getAdminMobiles() {
        $query = $this->db->prepare("
            SELECT mobile_id, mobile_name
            FROM mobiles
            ORDER BY mobile_name
        ");

        $query->execute();

        return $query->fetchAll();
    }



    public function createAdminMobiles($data) {
        $data = $this->sanitizer($data);
        
        $query = $this->db->prepare("
            INSERT INTO mobiles
            (mobile_name, unit_sold, is_smartphone, released_date, 
            size, weight, display_resolution, display_inches, platform, 
            is_dualsim, has_cardslot, memory_rom_ram, camera, video,  	
            has_bluetooth, battery, mobile_img) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)   
        ");

        $query->execute([
            $data["mobile_name"],
            $data["unit_sold"],
            $data["is_smartphone"],
            $data["released_date"],
            $data["size"],
            $data["weight"],
            $data["display_resolution"],
            $data["display_inches"],
            $data["platform"],
            $data["is_dualsim"],
            $data["has_cardslot"],
            $data["memory_rom_ram"],
            $data["camera"],
            $data["video"],
            $data["has_bluetooth"],
            $data["battery"],
            $data["mobile_img"]            
        ]);
    }



    public function delAdminMobiles($id) {
        $query = $this->db->prepare("
            DELETE
            FROM mobiles
            WHERE mobile_id = ?
        ");

        $query->execute([$id]);

    }








}