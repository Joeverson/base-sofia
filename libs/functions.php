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

        if($_SERVER['SERVER_NAME'] == "localhost")
            return $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".$subpath[1]."/";

        return $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/";
    }


    //#hall da fama ... @makeMenu
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



    /**
     * @param $array
     * @return null
     */
    public function prepareArrayDoublePointer($array){
        if(!is_array($array) || empty($array))
            return null;

        foreach($array as $key => $val){
            if( $val === "" ) continue;

            $newArray[':'.$key] = $val;
        }

        return $newArray;
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