<?php
require_once("models/mod.dbase.php");
    
    class Contents extends Dbase {

        public function getContents($cont, $lang) {
            $query = $this->db->prepare("
                SELECT cont, lang, pic, title, hdr_1, hdr_2, hdr_3, item_1, item_2, item_3, item_4, item_5, item_6, item_7, item_8, item_9, item_10, item_11, item_12, item_13, item_14, item_15, item_16
                FROM contents
                WHERE cont = ? && lang = ?
            ");
            
            $query->execute([
                $cont,
                $lang
            ]);
    
            return $query->fetch();
    
        }
        

        public function updateTxtHome($data, $lang) {
            $data = $this->sanitizer($data);

            $query = $this->db->prepare("
                UPDATE contents
                SET item_1 = ?, item_2 = ?
                WHERE cont = ? && lang = ? 
            ");
    
            $query->execute([
                $data["tit"],
                $data["txt"],
                1,
                $lang
                
            ]);
    
        }
        

        public function updatePicHome($data) {
            $data = $this->sanitizer($data);
            
            $query = $this->db->prepare("
                UPDATE contents
                SET pic = ?
                WHERE cont = ? && lang = ? 
            ");
    
            $query->execute([
                $data["pic"],
                1,
                "PT"     
            ]);
    
        }












}