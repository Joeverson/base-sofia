<?php
require '../../../../Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$db = new \modules\admin\user\models\DBUser;
$fn = new \libs\functions;

$db->insertUser($fn->prepareArrayDoublePointer($_POST, false));