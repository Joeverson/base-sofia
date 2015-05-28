<?php

class dbVereador extends DB{

    public function selectAllVereadores(){
        return $this->conn->query("select * from vereadores");
    }
}