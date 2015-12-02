<?php
session_start();
require '../../../../Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$db = new modules\admin\artigos\model\DBArtigos;
$fn = new \libs\functions;


if($_POST['edit'] != "false"){
    if(!empty ($_FILES['img']['name'])){
        if(move_uploaded_file($_FILES['img']['tmp_name'], '../../../includes/img/projects/'.time().'_'.$_FILES['img']['name'])){
            $_POST['img'] = time().'_'.$_FILES['img']['name'];
        }
    }

    unset($_POST['edit']);
    $id = $_POST['id'];
    unset($_POST['id']);

    if($_POST['cat_artigo'] == -1){
        $_POST['cat_artigo'] = $_POST['old_cat'];
        unset($_POST['old_cat']);
    }else{
        unset($_POST['old_cat']);
    }

    if($db->updateArticle($fn->generateQuerySqlUpdatePDO("artigos", $_POST, $id, "id_artigo")) != '00000')
        unlink('../../../includes/img/projects/'.time().'_'.$_FILES['img']['name']);

    exit;
}



//removendo coisas desnecessarias que vinheram no post.. por causa do edit.......
unset($_POST['edit']);
unset($_POST['id']);
unset($_POST['old_cat']);



if(empty ($_FILES['img']['name'])){
    $db->insertProject($fn->prepareArrayDoublePointer($_POST,false));
}else{
    if(move_uploaded_file($_FILES['img']['tmp_name'], '../../../includes/img/projects/'.time().'_'.$_FILES['img']['name'])){
        $_POST['img'] = time().'_'.$_FILES['img']['name'];
        $_POST['id_user'] = $_SESSION['user']['id_user'];

        if($db->insertProject($fn->prepareArrayDoublePointer($_POST, false)) != '00000')
            unlink('../../../includes/img/projects/'.time().'_'.$_FILES['img']['name']);
    }
}



