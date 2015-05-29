<?php
class DBArticles extends DB{
    public function insertArticle($dados){
        $cat = $dados[':categoria'];
        unset($dados[':categoria']);
        unset($dados[':pdf']);
        var_dump($cat);
        $this->conn->beginTransaction();

        try{
            $stmt = $this->conn->prepare("INSERT INTO noticias (title, subtitle, text, resume, image, id_membro) VALUES (:title, :subtitle, :text, :resume, :image, :id_membro)");
            $stmt->execute($dados);
            $id_noticia = $this->conn->lastInsertId();
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }

        $this->insertCat($cat, $id_noticia);

    }

    public function getAllCategorias(){
        $rs = $this->conn->query("select * from category");

        if(($rs == null) || ($rs == false))
            return false;

        return $rs;
    }

    public function insertCat($vetor, $noticia){
        try{
            foreach ($vetor as $cat ){
               $stmt = $this->conn->prepare("INSERT INTO categoriasnoticias (id_category, id_notice) VALUES (:id_category, :id_notice)  ");
               $stmt->execute(array(
                   ":id_category" => $cat,
                   ":id_notice"     => $noticia
               ));
            }
        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}