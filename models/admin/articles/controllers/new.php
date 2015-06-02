<?php
$actions = new control();
include "models/admin/articles/models/db.articles.php";
$DBArticles = new DBArticles();

try{
    if (isset($_FILES['image']) ){
        $nome_arquivo = $actions->_FILE()->upload($_FILES['image'], "models/site/includes/images/noticias/");
        $_POST['image'] = $nome_arquivo;
    }
var_dump($_FILES);
    if (isset($_FILES['pdf']) && $_FILES['pdf']['size'] != 0){
        $nome_pdf = $actions->_FILE()->upload($_FILES['pdf'], "models/site/includes/pdf/", ".pdf");
        $_POST['pdf'] = $nome_pdf;
    }

    $_POST['id_membro'] = $_SESSION['user']['id'];
    unset($_POST['novacategoria']);

    if($DBArticles->insertArticle($actions->_ACTIONS()->prepareArrayDoublePointer($_POST))){
        header("location: ".$actions->_ACTIONS()->siteUrl()."admin/articles");
    }
}catch (Exception $e){
    echo $e->getMessage();
}
?>