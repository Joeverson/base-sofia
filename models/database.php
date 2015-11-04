<?php
namespace models;

class database{
    private $user = '';
    private $pass = '';
    private $host = '';
    private $bdname = '';
    private $socket = 'mysql';
    protected $conn;


    public function __construct(){

        try{
            $this->conn = new \PDO($this->socket.":host=".$this->host.";dbname=".$this->bdname, $this->user, $this->pass);
        }catch(\PDOException $e){
            echo "Deu algum erro na conexão - ".$e->getMessage();
        }
    }

    public function segPassEncript($pass){
        return md5(sha1($pass));
    }

    public function auth($array){ // Busca a senha no bd e retorna true se tiver ou retorna false caso não tenha
        return $this->conn->query("SELECT * FROM user WHERE pass = '".$this->segPassEncript($array['pass'])."' and name = '".$array['name']."'")->fetchAll(\PDO::FETCH_ASSOC);
    }

// crud User:::
    public function insertUser($array){
        try{
            $keys = array_keys($array);
            $stmt = $this->conn->prepare("INSERT INTO user(name, email, pass, id_tipo) VALUES(".$keys[0].",".$keys[1].",".$keys[3].",".$keys[2].")");
            $stmt->execute($array);
            return true;
        }catch(\PDOException $e){
            return $e->getMessage();
        }
    }

    public function updateUser($array, $id){
        try{
            if(array_key_exists(":pass", $array)){
                $stmt = $this->conn->prepare("UPDATE user set name = '".$array[':name']."', pass = '".$array[':pass']."', email = '".$array[':email']."',  id_tipo = '".$array[':cat']."' WHERE id_user = '".$id."'");
                $stmt->execute($array);
            }else{
                $stmt = $this->conn->prepare("UPDATE user set name = '".$array[':name']."',  email = '".$array[':email']."',  id_tipo = '".$array[':cat']."' WHERE id_user = '".$id."'");
                $stmt->execute($array);
            }
            return true;
        }catch(\PDOException $e){
            return $e->getMessage();
        }
    }


    public function deleteUser($id){
        try{
            $stmt = $this->conn->prepare("DELETE FROM user WHERE id_user = '".$id."'");
            $stmt->execute();

            return true;
        }catch(\PDOException $e){
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
        $rs = $this->conn->query("SELECT name, id_user, email, name_cat FROM user inner JOIN tipos on user.id_tipo = tipos.id_tipo WHERE user.id_user = '".$id."'");
        if(($rs == false) || ($rs == NULL))
            return false;

        foreach($rs as $k)
            return $k;

    }
}
