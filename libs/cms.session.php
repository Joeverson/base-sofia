<?php
/*
 * no vivald ta dando pau na chamada não sei oque é... mas no mozila ta rodando de boa
 * */
class SESSION{
    private static $instance = null;
    private static $open;

    private function __construct(){
        self::$open = session_start();
    }

    public static function on(){// tecnica para não instanciar varias vezes esse objeto
        if(self::$instance == null)
            self::$instance = new SESSION();

        return self::$instance;
    }

    public static function data($str){
        if (self::$open)
            try {
                return $_SESSION[$str];
            }catch(ErrorException $e){
                return ":( .::. ".$e->getMessage()." .::.";
            }

    }
    public static function setData($array){
        if(self::$open)
            $_SESSION[array_keys($array)[0]] = array_values($array)[0];
    }

    public static function setUser($array){
        if(self::$open)
           $_SESSION['user'] = $array;
    }

    public static function user($str = null){
        if(self::$open)
            if(isset($str)){
                try {
                    return $_SESSION['user'][$str];
                }catch(ErrorException $e){
                    return ":( .::. ".$e->getMessage()." .::.";
                }
            }else
                return $_SESSION['user'];
    }

    public static function close(){
        if(self::$open)
            session_destroy();
    }
}