<?php
class USER extends control{
    private $bd;
    private $fcn;

    public function  __construct(){
        $this->bd = parent::_DB();
        $this->fcn = parent::_ACTIONS();
    }

    public function newUser($args){
        $array = $this->fcn->prepareArrayDoublePointer($args);
        $array[':pass'] = $this->bd->segPassEncript($array[':pass']);

        return $this->bd->insertUser($array);
    }


    public function updateUser($array, $id){
        return $this->bd->updateUser($this->fcn->prepareArrayDoublePointer($array), $id);
    }

    public function deleteUser($id){
        return $this->bd->deleteUser($id);
    }

    public function selectAllUser(){
        return $this->bd->selectAllUser();
    }

    public function selectUser($id){
        return $this->bd->selectUser($id);
    }

    public function selectAllCategory(){
        return $this->bd->selectAllCategory();
    }

}