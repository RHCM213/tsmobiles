<?php

class Dbase {
    public $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=" .ENV["DB_HOST"]. ";dbname=" .ENV["DB_NAME"]. ";charset=utf8mb4",ENV["DB_USER"], ENV["DB_PASSWORD"]);

        //Atributos Genéricos:
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        //Modo de relatório de erros PDO » Diagnósticos de Aviso
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //Modo não repetição da informação Objecto e Associativo
        $this->db->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
        //Modo 'no stringify' números
    
    }
}