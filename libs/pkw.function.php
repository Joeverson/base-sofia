<?php
class ACTIONS extends control{
    private $basePath;

    public function __construct(){
       $this->basePath = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
        //$this->basePath = parent::_SLIM()->request->getHost()."/sophiacms/";
    }

    public function BPath($page = ''){
        if($page == '')
            return $this->basePath;

        return $this->basePath.$page;
    }
}