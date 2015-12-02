<?php
require '../../../../Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$db = new \modules\admin\artigos\model\DBArtigos;
$fn = new \libs\functions;

print json_encode($db->findArtigos($_POST['search']), JSON_FORCE_OBJECT);