<?php
class dbUser extends DB{

    public function insertUser($array){
        try{
            $keys = array_keys($array);
            $stmt = $this->conn->prepare("INSERT INTO usuarios(name, email, pass, id_tipo) VALUES(".$keys[0].",".$keys[1].",".$keys[3].",".$keys[2].")");
            $stmt->execute($array);
            return true;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function updateUser($array, $id){
        try{
            if(array_key_exists(":pass", $array)){
                $stmt = $this->conn->prepare("UPDATE usuarios set name = '".$array[':name']."', pass = '".$array[':pass']."', email = '".$array[':email']."',  id_tipo = '".$array[':cat']."' WHERE id = '".$id."'");
                $stmt->execute($array);
            }else{
                $stmt = $this->conn->prepare("UPDATE usuarios set name = '".$array[':name']."',  email = '".$array[':email']."',  id_tipo = '".$array[':cat']."' WHERE id = '".$id."'");
                $stmt->execute($array);
            }
            return true;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }


    public function deleteUser($id){
        try{
            $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id = '".$id."'");
            $stmt->execute();

            return true;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }


    public function selectAllUser(){ // retorna um array com as informações de acordo com o mês
        $rs = $this->conn->query("SELECT *, DATE_FORMAT(last_login,'%d.%m.%Y - %h.%i.%s') as last_login FROM allusers order by name ASC");
        if(($rs == false) || ($rs == NULL))
            return false;

        return $rs;
    }

    public function selectUser($id){ // retorna um array com as informações de acordo com o mês
        $rs = $this->conn->query("SELECT name, id, email, name_cat FROM usuarios inner JOIN tipos on usuarios.id_tipo = tipos.id_tipo WHERE usuarios.id = '".$id."'");
        if(($rs == false) || ($rs == NULL))
            return false;

        foreach($rs as $k)
            return $k;

    }
//:: crud user finished::

}