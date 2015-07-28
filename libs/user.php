<?php
namespace libs;
use models\database;

class user extends database{
    private $bd;
    private $fcn;

    public function  __construct(){
        $this->fcn = new \libs\functions;

    }

    public function selectAllUser(){
        return parent::selectAllUser();
    }

    public function selectUser($id){
        return parent::selectUser($id);
    }

    public function newUser($args){
        $array = $this->fcn->prepareArrayDoublePointer($args);
        $array[':pass'] = $this->segPassEncript($array[':pass']);

        return $this->insertUser($array);
    }

    public function updateUser($array, $id){
        return $this->updateUser($this->fcn->prepareArrayDoublePointer($array), $id);
    }

    public function deleteUser($id){
        return $this->deleteUser($id);
    }

    public function selectAllCategory(){
        return parent::selectAllCategory();
    }

}