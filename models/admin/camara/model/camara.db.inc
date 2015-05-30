<?php

class camaraDb extends DB{
    public function updateCamara($array){
        try{
            $stmt = $this->conn->prepare("UPDATE camara set text = '".$array[':text']."' WHERE id_camara = 1");
            return $stmt->execute($array);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function selectAbout(){
        $stmt = $this->conn->query("select * from camara");
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }

}