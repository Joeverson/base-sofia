<?
class ACTIONS{
    private $basePath;

    public function __construct(){
       $this->basePath = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];

    }

    public function BPath($page){
        return array("path" => $this->basePath.$page);
    }
}