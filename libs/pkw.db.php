<?
class DB{
    private $user = 'root';
    private $pass = '';
    private $host = 'localhost';
    private $bdname = 'kraytosCMS';
    private $socket = 'mysql';
    private $conn;


    public function __construct(){
        try{
            $this->conn = new PDO($this->socket.":host=".$this->host.";dbname=".$this->bdname, $this->user, $this->pass);
        }catch(Exception$e){
            echo "Deu algum erro na conexão";
        }
    }

    public function auth($pass){ // Busca a senha no bd e retorna true se tiver ou retorna false caso não tenha
        $rs = $this->conn->query("SELECT pass,name FROM u WHERE pass = '".$pass."'");

        if($result = $rs->fetch(PDO::FETCH_ASSOC))
            return $result;

        return false;
    }


    public function insertUser($array){
        try{
            $stmt = $this->conn->prepare("INSERT INTO u(name, pass, pass2) VALUES(:nome, :pass, :pass2)");
            $stmt->execute($array);
        }catch(Exception $e){
            return $e->getMessage();
        }
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

}