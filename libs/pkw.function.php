<?php
class ACTIONS extends control{

    public function __construct(){ }

    public function BPath($page = ''){
        if($page == '')
            return "http://".$_SERVER['SERVER_NAME']."/models/";

        return "http://".$_SERVER['SERVER_NAME']."/models/".$page.'/';
    }

    public function urlPath(){
        return "http://".$_SERVER['SERVER_NAME']."/cms/models/";
    }
    public function sitePath(){
        return "http://".$_SERVER['SERVER_NAME']."/cms/models/site/";
    }
    public function siteUrl(){
        return "http://".$_SERVER['SERVER_NAME']."/cms/";
    }
    public function adminUrl(){
        return "/cms/admin";
    }
    public function urlModels(){
        return "http://".$_SERVER['SERVER_NAME']."/cms/models/";
    }
    public function baseUrlAjax(){
        return "http://".$_SERVER['SERVER_NAME']."/cms/";
    }
    public function linkTitle($link){
        $link = str_replace(" ", "-", $link);
        return $link;
    }

    public function makeMenu(){
        $acessLevel = $_SESSION['acessLevel'];  //informação necessária para saber o nivel de acesso do usuário logado

        foreach(scandir('models/admin') as $k)
            if(($k != '.') && ($k != '..') && (!preg_match("/([.])/",$k))) {
                $manifest = 'models/admin/' . $k . '/manifest.json';
                if (is_file($manifest)) {
                   $obj = json_decode(file_get_contents($manifest), true);


                    if (!empty($obj['acessLevel'])){
                        $autorizacao = explode(',', $obj['acessLevel']);
                        //if (!in_array($acessLevel, $autorizacao)) continue;
                    }

                    if ($obj['dad'] == "this") {
                        $masters[$obj['dadsName']] = $obj;
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

        return $masters;
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