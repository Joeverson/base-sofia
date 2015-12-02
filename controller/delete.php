<?php
require '../../../../Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$db = new modules\admin\artigos\model\DBArtigos;
$fn = new \libs\functions;


if($db->deleteArticle($_POST['id']) == "00000")
    print json_encode(array("status" => "ok"), JSON_FORCE_OBJECT);



