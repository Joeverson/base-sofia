<?php
$actions = new control();
include "models/admin/articles/models/db.articles.php";
$DBArticles = new DBArticles();

try{
    $nome_arquivo = $actions->_FILE()->upload($_FILES['image'], "models/site/includes/images/noticias/");
    $_POST['id_membro'] = $_SESSION['user']['id'];
    $_POST['image'] = $nome_arquivo;


    if($DBArticles->insertArticle($actions->_ACTIONS()->prepareArrayDoublePointer($_POST))){

    }
}catch (Exception $e){
    echo $e->getMessage();
}
?>