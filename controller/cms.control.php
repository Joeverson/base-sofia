<?php
 class control{
     protected $slim = null;

     public function __construct(){
         include_once 'libs/cms.session.php'; // inclue o arquivo - quando for instanciado o control o session vai junto
         SESSION::on(); // inicia a class de session - nivel Obrigatorio
     }

     public function _DB(){
         include_once 'libs/pkw.db.php'; // inclue o arquivo
         return new DB(); // retorna a instancia
     }

     public function _FILE(){
         include_once 'libs/pkw.file.php'; // inclue o arquivo
         return new FILES(); // retorna a instancia
     }

     public function _LOGIN(){
         include_once 'libs/pkw.login.php'; // inclue o arquivo
         return new LOGIN(); // retorna a instancia
     }

     public function _USER(){
         include_once 'libs/pkw.user.php'; // inclue o arquivo
         return new USER(); // retorna a instancia
     }

     public function _SLIM(){
         if($this->slim == null){
             require 'Slim/Slim.php';
             \Slim\Slim::registerAutoloader();

             $app = new \Slim\Slim(array('templates.path' => 'c:/xampp/htdocs/Dropbox/sophiacms/models')); // retorna a instancia

             $app->add(new \Slim\Middleware\SessionCookie(array(
                 'expires' => '20 minutes',
                 'path' => '/',
                 'domain' => null,
                 'secure' => false,
                 'httponly' => false,
                 'name' => 'slim_session',
                 'secret' => 'CHANGE_ME',
                 'cipher' => MCRYPT_RIJNDAEL_256,
                 'cipher_mode' => MCRYPT_MODE_CBC
             )));

             $app->config(array('debug'=>'true'));

             $this->slim = $app;
         }

         return $this->slim;
     }

 }