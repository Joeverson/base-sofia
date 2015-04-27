<?php
class LOGIN extends control{

    public function __construct(){}

    // pega a senha e verifica se existe no banco de dados

    public function singIn($pass){
        $db = parent::_DB();
        if($r = $db->auth($pass)) {
            SESSION::setUser($r); // guardando dados do usuario
            return json_encode($r); // retorno para ajax
        }

        return json_decode('{"error":"Erro na autenticação"}'); // retorno para ajax
    }


    public function singOut(){

    }

}
