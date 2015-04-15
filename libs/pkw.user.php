<?
class USER extends control{
    public function newUser($nome,$pass,$pass2){
        $bd = parent::_DB();
        return $bd->insertUser(array(':nome'=>$nome,':pass'=>$pass,':pass2'=>$pass2));

    }
    public function UpdateUser(){}
    public function deletUser(){}

}