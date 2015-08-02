<?php
/*
 * criar log de linhas modificadas.
 */
namespace libs;

class autoUpdate{
    // lista de pastas que o auto update não vai verificar
    private static $badPath = ["Slim","modules"];
    private static $path = "configs/auto.update.xml";



    public static function on(){
        self::config();
        self::ftp();
    }

    public static function config(){
        $data = self::scan();

        if(!file_exists(self::$path))
            self::generateConfig();

        $dom = new \DOMDocument("1.0", "ISO-8859-1");
        $dom->load(self::$path);

        $path = new \DOMXPath($dom);

        $q = $path->query("/auto-update/file");

        foreach($q as $f){
            if($data[$f->childNodes[0]->nodeValue] != $f->childNodes[1]->nodeValue)
                echo "modificado";
        }
    }

    private static function scan(){
        $data = array();

        //lendo estrutura sofia
        foreach(scandir('.') as $k)
            if(($k != '.') && ($k != '..') && (!preg_match("/([.])/",$k)))
                if(array_search($k, self::$badPath) === false)
                    foreach(scandir($k) as $g)
                        if(($g != '.') && ($g != '..'))
                            $data[$k.'/'.$g] = filesize($k.'/'.$g);

        return $data;
    }

    public static function generateConfig(){
        $data = self::scan();

        //gerando o json
        $dom = new \DOMDocument("1.0", "ISO-8859-1");
        $root = $dom->createElement("auto-update");


        foreach($data as $k => $v){
            $child = $dom->createElement("file");
            $child->appendChild($dom->createElement("uri", $k));
            $child->appendChild($dom->createElement("size", $v));
            $root->appendChild($child);
        }

        $dom->appendChild($root);
        $dom->save(__dir__."/../configs/auto.update.xml");

    }

    public static function ftp(){

        /*
        if($ftp = ftp_connect("ftp.314.bl.ee"))
            if($login = ftp_login($ftp, "u699756447.site314", 'joe7895214+'))
                echo "foi";//echo ftp_put($ftp, "/", __dir__."/../configs/auto.update.xml", FTP_BINARY);
        ftp_close($ftp);*/

    }
}