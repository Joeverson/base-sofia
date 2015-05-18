<?php
class ACTIONS extends control{

    public function __construct(){ }

    public function BPath($page = ''){
        if($page == '')
            return "http://".$_SERVER['SERVER_NAME']."/models/";

        return "http://".$_SERVER['SERVER_NAME']."/models/".$page.'/';
    }

    public function urlModels(){
        return "http://".$_SERVER['SERVER_NAME']."/cms/models/";
    }

    public function urlPath(){
        return "http://".$_SERVER['SERVER_NAME']."/cms/";
    }

    public function makeMenu(){
        foreach(scandir('models/admin') as $k)
            if(($k != '.') && ($k != '..') && (!preg_match("/([.])/",$k))){
                $obj = json_decode(file_get_contents('models/admin/'.$k.'/manifest.json'), true);

                if ($obj['dad'] == "this"){
                    $masters[$obj['dadsName']] = $obj;
                }else{
                    $subs[$obj['dad']] = $obj;
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
}