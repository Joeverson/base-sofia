<?php
session_start();
require '../../../../Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$db = new modules\admin\artigos\model\DBArtigos;
$fn = new \libs\functions;

if(isset($_POST['itens']))
    print json_encode($db->getLast($_POST['cat'],$_POST['itens']), JSON_FORCE_OBJECT);
else
    print json_encode($db->getLast($_POST['cat'], 3), JSON_FORCE_OBJECT);




