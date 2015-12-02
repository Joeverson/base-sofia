<?php
namespace modules\admin\artigos\model;
use models\database;

class DBArtigos extends database{

    public function insertProject($array){
        //agora tentamos inserir a notícia
        try{
            if(array_key_exists(':img', $array))
                $stmt = $this->conn->prepare("INSERT INTO artigos (title, description, img, cat_artigo, id_user) VALUES (:title, :description, :img, :cat_artigo, :id_user)");
            else
                $stmt = $this->conn->prepare("INSERT INTO artigos (title, description, cat_artigo, id_user) VALUES (:title, :description, :cat_artigo, :id_user)");

            $stmt->execute($array);
            var_dump($array);
            return $stmt->errorCode();
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

//gets


    public function getAllArticles(){
        $rs = $this->conn->query("select * from artigos");
        var_dump($rs->fetchAll(\PDO::FETCH_ASSOC));
    }

    //pega os ultimos artigos-> recebendo as quantidades de artigos que vão ser retornados;
    public function getLast($cat='all', $count=10){
        if($cat == "all")
            $rs = $this->conn->query("select * from artigos join category on artigos.cat_artigo=category.id_category join user ON artigos.id_user=user.id_user order by artigos.date desc limit ".$count);
        else
            $rs = $this->conn->query("select * from artigos join category on artigos.cat_artigo=category.id_category join user ON artigos.id_user=user.id_user where category.category='".$cat."' order by artigos.date desc limit ".$count);
        return $rs->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function getArtigoById($id){
        $rs = $this->conn->query("select * from artigos join category on artigos.cat_artigo=category.id_category join user ON artigos.id_user=user.id_user where artigos.id_artigo=".$id);
        return $rs->fetch(\PDO::FETCH_ASSOC);
    }

    public function getProjectsById($id){
        $rs = $this->conn->query("select * from artigos where id_artigo=".$id);
        return $rs->fetch(\PDO::FETCH_ASSOC);
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
            return true;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function newCat($cat){
        try{
            $stmt = $this->conn->prepare("INSERT INTO category (name_category) VALUES (:cat)");
            $stmt->execute(array(":cat" => $cat));
            return $this->conn->lastInsertId();
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function insertPdf($nomePdf, $pdftitulo){
        try{
            $stmt = $this->conn->prepare("INSERT INTO pdf (file, titulo) VALUES (:pdf, :titulo)");
            $stmt->execute(array(":pdf" => $nomePdf, ":titulo" => $pdftitulo));
            return $this->conn->lastInsertId();
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function allCategory(){
        try{
            return $this->conn->query("SELECT * FROM category")->fetchAll(\PDO::FETCH_ASSOC);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
//find

    public function findArtigos($str){
        try{
            return $this->conn->query("select * from artigos where title like '%".$str."%' limit 3")->fetchAll(\PDO::FETCH_ASSOC);
        }catch(\Exception $e){
            $e->getMessage();
        }
    }

//delete

    public function deleteArticle($id){
        try{
            return $this->conn->query("delete from artigos where id_artigo =".$id)->errorCode();
        }catch(\Exception $e){
            $e->getMessage();
        }
    }


//update

    public function updateArticle($query){
        try{
            return $this->conn->query($query)->errorCode();
        }catch(\Exception $e){
            $e->getMessage();
        }
    }
}