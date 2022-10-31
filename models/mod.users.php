<?php
require_once("models/mod.dbase.php");

class Users extends Dbase {
   
    public function create($data) {
        $query = $this->db->prepare("
            INSERT INTO users
            (user_name, first_name, last_name , phone, address, country_code, postal_code, email, password, user_photo)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)   
        ");

        $query->execute([
            $data["user_name"],
            $data["first_name"],
            $data["last_name"],
            $data["phone"],
            $data["address"],
            $data["country_code"],
            $data["postal_code"],
            $data["email"],
            password_hash($data["password"], PASSWORD_DEFAULT),
            $data["user_photo"]
        ]);

        return $this->db->lastInsertId();
    }



        
    public function getUsers() {
        $query = $this->db->prepare("
            SELECT user_photo, user_id, user_name, email, is_admin
            FROM users
            ORDER BY user_name
        ");
        
        $query->execute();

        return $query->fetchAll();

    }



    public function getUser($user_id) {
        $query = $this->db->prepare("
            SELECT user_photo, user_id, user_name, first_name, last_name, phone, address, country_name, postal_code, email, is_admin
            FROM users
            INNER JOIN countries USING (country_code)
            WHERE user_id = ?
        ");
        
        $query->execute([$user_id]);

        return $query->fetch();

    }



    public function login($data) {
        $query = $this->db->prepare("
            SELECT user_id, password, is_admin
            FROM users
            WHERE email = ? OR user_name = ?
        ");
        
        $query->execute([
            $data["login_ref"],
            $data["login_ref"]
        ]);

        $user = $query->fetch();

        if(!empty($user) && 
        password_verify($data["password"], $user["password"])){
            return $user;
        }
        
        return [];   
    }



    public function update($data, $upduser_id) {
        $query = $this->db->prepare("
            UPDATE users
            SET user_name = ?, first_name = ?, last_name = ? , phone = ?, 
            address = ?, country_code = ?, postal_code = ?, email = ?, 
            is_admin = ?, user_photo = ?
            WHERE user_id = ? 
        ");

        $query->execute([
            $data["user_name"],
            $data["first_name"],
            $data["last_name"],
            $data["phone"],
            $data["address"],
            $data["country_code"],
            $data["postal_code"],
            $data["email"],
            $data["is_admin"],
            $data["user_photo"],
            $upduser_id
            
        ]);

        return $data;

    }




}
