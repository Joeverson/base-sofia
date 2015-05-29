<?php
class dbVereador extends DB{

    public function selectAllVereadores(){
        return $this->conn->query("select * from vereadores");
    }

    public function selectVereador($id){
        $stmt = $this->conn->query("select * from vereadores where id_vereador = '".$id."'");
        return $stmt->fetch();
    }

    public function insertVereador($array){
        try{
            $stmt = $this->conn->prepare("INSERT INTO vereadores(name, dt_birth, formacao, email, atividade, partido, img) VALUES(:name, :dt_birth, :formacao, :email, :atividade, :partido, :img)");
            return $stmt->execute($array);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function updateVereador($array, $id){
        try{
            if(array_key_exists(":img", $array))
                $stmt = $this->conn->prepare("UPDATE vereadores set name = '".$array[':name']."', dt_birth = '".$array[':dt_birth']."', formacao = '".$array[':formacao']."',  email = '".$array[':email']."',  atividade = '".$array[':atividade']."',  partido = '".$array[':partido']."',  img = '".$array[':img']."' WHERE id_vereador = '".$id."'");
            else
                $stmt = $this->conn->prepare("UPDATE vereadores set name = '".$array[':name']."', dt_birth = '".$array[':dt_birth']."', formacao = '".$array[':formacao']."',  email = '".$array[':email']."',  atividade = '".$array[':atividade']."',  partido = '".$array[':partido']."' WHERE id_vereador = '".$id."'");

            return $stmt->execute($array);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteVereador($id){
        try{
            $stmt = $this->conn->prepare("DELETE FROM vereadores WHERE id_vereador = '".$id."'");
            return $stmt->execute();
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}