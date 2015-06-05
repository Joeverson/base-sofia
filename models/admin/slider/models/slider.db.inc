<?php
class dbSlider extends DB{

    public function selectAllSlider(){
        return $this->conn->query("select * from slider");
    }

    public function selectSlider($id){
        $stmt = $this->conn->query("select * from slider where id_slider = '".$id."'");
        return $stmt->fetch();
    }

    public function insertSlider($array){
        try{
            $stmt = $this->conn->prepare("INSERT INTO slider(title, text, img) VALUES(:title, :text, :img)");
            return $stmt->execute($array);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function updateSlider($array, $id){
        try{
            if(array_key_exists(":img", $array))
                $stmt = $this->conn->prepare("UPDATE slider set title = '".$array[':title']."', text = '".$array[':text']."',  img = '".$array[':img']."' WHERE id_slider = '".$id."'");
            else
                $stmt = $this->conn->prepare("UPDATE slider set title = '".$array[':title']."', text = '".$array[':text']."' WHERE id_slider = '".$id."'");

            return $stmt->execute($array);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteSlider($id){
        try{
            $stmt = $this->conn->prepare("DELETE FROM slider WHERE id_slider = '".$id."'");
            return $stmt->execute();
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}