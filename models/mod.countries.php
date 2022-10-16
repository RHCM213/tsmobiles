<?php
require_once("models/mod.dbase.php");

class Countries extends Dbase {
    public function getcountries() {
        $query = $this->db->prepare("
            SELECT country_code, country_name
            FROM countries
        ");

        $query->execute();

        return $query->fetchAll();
    }
}