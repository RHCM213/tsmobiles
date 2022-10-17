<?php
require_once("models/mod.dbase.php");

class Users extends Dbase {
    public function create($data) {
        $query = $this->db->prepare("
            INSERT INTO users
            (user_name, first_name, last_name , phone, address, country, postal_code, email, password, user_photo)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)   
        ");

        $query->execute([
            $data["user_name"],
            $data["first_name"],
            $data["last_name"],
            $data["phone"],
            $data["address"],
            $data["country"],
            $data["postal_code"],
            $data["email"],
            password_hash($data["password"], PASSWORD_DEFAULT),
            $data["user_photo"]
        ]);

        return $this->db->lastInsertId();
    }



        
    public function getusernames() {
        $query = $this->db->prepare("
            SELECT user_id, user_name
            FROM users
        ");
        
        $query->execute();

        return $query->fetchAll();

    }


    public function login($data) {
        $query = $this->db->prepare("
            SELECT user_id, password
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

}
