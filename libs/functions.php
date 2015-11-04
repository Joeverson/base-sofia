<?php
namespace libs;

class functions{
    public function __construct(){ }

    public function BPath($page = ''){
        if($page == '')
            return $this->adapterURI()."models/";

        return $this->adapterURI()."models/".$page.'/';
    }

    public function urlPath(){
        return $this->adapterURI()."modules/";
    }

    //gerador de links (adaptador)
    public function linkTitle($link){
        $link = str_replace(" ", "-", $link);
        return $link;
    }

    //metodo de adaptação de url
    private function adapterURI(){
        $subpath = explode("/",$_SERVER['REQUEST_URI']);

        if(!preg_match("/([.])/",explode('/', $_SERVER['PHP_SELF'])[1]))//pega a primeira chamada padrão do apache e vé se eum a rquivo  ou um diretorio se dor um diretorio ele coloca no nome do diretorio como base apdrão
            return $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".$subpath[1]."/";

        return  $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'] . '/';
    }


    //#hall da fama ... @makeMenu -- então né
    public function makeMenu(){
        //$acessLevel = $_SESSION['acessLevel'];  //informação necessária para saber o nivel de acesso do usuário logado
        if(!empty($_SESSION['makeMenu'])) return $_SESSION['makeMenu'];
        $masters = array();

        foreach(scandir('modules/admin') as $k)
            if(($k != '.') && ($k != '..') && (!preg_match("/([.])/",$k))) {
                $manifest = 'modules/admin/' . $k . '/manifest.json';

                if (is_file($manifest)) {
                    $obj = json_decode(file_get_contents($manifest), true);

                    if ($obj['dad'] == "this") {
                        if (!empty($obj['acessLevel'])){
                            $array = explode(",", $obj['acessLevel']);
                            $masters[$obj['title']] = $obj;
                            $masters[$obj['title']]['acessLevel'] = $array;
                        }else{
                            $masters[$obj['title']] = $obj;
                        }
                    } else {
                        $subs[$obj['dad']] = $obj;
                    }
                }
            }

        if(!empty($subs)){
            foreach ($subs as $sub){
                foreach($sub['submenu'] as $s)
                    $masters[$sub['dad']]['submenu'][] = $s;
            }
        }

        return $_SESSION["makeMenu"] = $masters;
    }

    public static function findFilesNamesByDir($dir){
        $path = array();
        foreach(scandir(__dir__.'/../modules/site/'.$dir) as $k)
            if(($k != '.') && ($k != '..')) {
                if($str = explode(' ', $k)){
                    $c = implode('', $str);

                    if(rename(__dir__.'/../modules/site/'.$dir.'/'.$k, __dir__.'/../modules/site/'.$dir.'/'.$c))
                        $path[] = $dir.'/'.$c;
                }else
                    $path[] = $dir.'/'.$k;


            }


        return $path;
    }

    public function segPassEncript($pass){
        return md5(sha1($pass));
    }

    /**
     * @param $array
     * @return null
     */
    public function prepareArrayDoublePointer($array, $flag = true){
        if(!is_array($array) || empty($array))
            return null;

        foreach($array as $key => $val){
            if( $val == "" and $flag) continue;
            if( $key == 'pass' ){
                $newArray[':'.$key] = $this->segPassEncript($val);
                continue;
            }

            $newArray[':'.$key] = $val;
        }

        return $newArray;
    }

    /*
     * esse metodo gera um query update para passar para o pdo ou para qualquer
     * lugar.
     * atributos que o metodo recebe:
     * $table => tabela que deseja atualizar
     * $array => dados que iram ser atualizados onde a chave e o coluna e o valor e o valor kk
     * $id => id que ira identificar a tupla para ser atualizada
     * $where=> condiçao para ser buscado junto com $id ex: $where = $id;
     */
    public function generateQuerySqlUpdatePDO($table, $array, $id, $where){
        $str = "UPDATE ".$table." SET";
        unset($array['id_user']);

        foreach($array as $key => $val){
            if($val == '' || $key == "id_user") continue;


            if(end($array) == $val)
                $str .= " $key = '".$val."' ";
            else
                $str .= " $key = '".$val."', ";
        }

        $str .= "WHERE ".$where." = '$id'";

        return $str;
    }

    /*
     * função para formatar o timestamp do bando de dados, ela reebe uma parametro extra caso deseje saber quantos
     * dias se passaram entre duas datas...
     * - se quiser só formatar apenas passe a data em formato timestamp do DB
     * - mas caso queira que apenas retorne a qantidade de dias corrido, passe a data e true
     *
     */
    public function dateTimeStampConsertAndOrganize($str, $timeCurrent=false){
        $strs = explode(" ", $str);
        $date = explode("-", $strs[0]);

        if($timeCurrent)
            return $date[2];

        if(@$date[2] == "00" or $date[0] == "0000" or $str === NULL)
            return "---";

        return $date[2]."/".$date[1]."/".$date[0];
    }

    public function checkAcess($caminho){
        $acessLevel = $_SESSION['acessLevel'];
        $caminho = $this->urlModels().$caminho."/manifest.json";
        $autorizacao = explode(",",json_decode(file_get_contents($caminho))->acessLevel); //autorizações da página acessada
        if (in_array($acessLevel, $autorizacao)) return true;
        return false;
    }

    public function filterRoutes($path){
        $Protects = array( // futuramente essas permissões seram em um arquivo separado ou no esquema no manifest.json -- obs: essa são permissoes de altenticação de pacote, não de modulo
            'admin'
        );

        foreach($Protects as $p)
            if( $p == $path )
                return true;
        return false;
    }

}