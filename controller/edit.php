<?php
session_start();
require '../../../../Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$db = new modules\admin\artigos\model\DBArtigos;
$fn = new \libs\functions;


print json_encode($db->getArtigoById($_POST['id']), JSON_FORCE_OBJECT);


