<?php
class DB{
    private $user = 'root';
    private $pass = '';
    private $host = 'localhost';
    private $bdname = 'cms';
    private $socket = 'mysql';
    protected $conn;


    public function __construct(){

        try{
            $this->conn = new PDO($this->socket.":host=".$this->host.";dbname=".$this->bdname, $this->user, $this->pass);
        }catch(Exception $e){
            echo "Deu algum erro na conexão - ".$e->getMessage();
        }
    }

    public function segPassEncript($pass){
        return md5(sha1($pass));
    }

    public function auth($array){ // Busca a senha no bd e retorna true se tiver ou retorna false caso não tenha
        $rs = $this->conn->query("SELECT id, name, email, id_tipo FROM usuarios WHERE pass = '".$this->segPassEncript($array['pass'])."' and name = '".$array['name']."'");
        if(($rs == false) || ($rs == NULL))
            return false;

        foreach($rs as $k)
            return $k;
    }

// crud User:::
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


    public function selectAllCategory(){ // retorna um array com as informações de acordo com o mês
        $rs = $this->conn->query("SELECT * FROM tipos");
        if(($rs == false) || ($rs == NULL))
            return false;

        return $rs;
    }

   /*public function selectAll($mes){ // retorna um array com as informações de acordo com o mês
       $rs = $this->conn->query("SELECT * FROM custos WHERE mes ='".$mes."'");
       if(($rs == false) || ($rs == NULL)){
           echo 'Mes não encontrado';
       }else{
           foreach($rs as $row) {
               $data[] = array('nome'=>$row['nome'], 'valor'=>$row['valor'], 'tempo'=>$row['tempo'], 'mes'=>$row['mes']);
           }
           return $data;
       }
   }

   public function selectAllMonth(){ // retorna um array com as todos os meses
       $rs = $this->conn->query("SELECT distinct mes FROM custos");
       if(($rs == false) || ($rs == NULL)){
           echo 'Mes não encontrado';
       }else{
           foreach($rs as $row) {
               $data[] = array('mes'=>$row['mes']);
           }
           return $data;
       }
   }

   public function insertCusto($array){
       try{
           $stmt = $this->conn->prepare("INSERT INTO custos(nome, valor, tempo, mes) VALUES(:nome, :valor, :tempo, :mes)");
           $stmt->execute($array);
       }catch(Exception $e){
           echo $e->getMessage();
       }
   }*/

    public function getXFromTable( $tabela, $order_by, $ascendency, $quantidade = "all"){
        try{
            $limit = ($quantidade == "all")? "" : "LIMIT ".$quantidade;
            $order = (!empty($order_by)) ? " ORDER BY ".$order_by." ".$ascendency : "";
            $rs = $this->conn->query("SELECT * FROM ".$tabela." ".$limit." ".$order );

            if(($rs == false) || ($rs == NULL))
                return false;
            return $rs->fetchAll();
        }catch(Exception $e){
            echo $e->getMessage();
        }

    }

}