<?php
class DBArticles extends DB{

    public function insertArticle($dados){
        $cat = $dados[':categoria']; unset($dados[':categoria']);
        $pdf= $dados[':pdf']; unset($dados[':pdf']);
        $pdftitulo = $dados[':pdftitulo']; unset($dados[':pdftitulo']);

        $this->conn->beginTransaction();
        // primeiro insere o PDF e descobre o ID inserido, pois ele será inserido na tabela da nova notícia
        if (isset($pdf) && !empty($pdf)){
            $pdfInserido = $this->insertPdf($pdf, $pdftitulo);
            $dados[":id_pdf"] = $pdfInserido; //associando à noticia
        }else{
            $dados[":id_pdf"] = "";
        }

        //agora tentamos inserir a notícia
        try{
            $stmt = $this->conn->prepare("INSERT INTO noticias (title, subtitle, text, resume, image, id_membro, id_pdf) VALUES (:title, :subtitle, :text, :resume, :image, :id_membro, :id_pdf)");
            $stmt->execute($dados);
            $id_noticia = $this->conn->lastInsertId();
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }

        //agora associamos a noticia a todas as categorias selecionadas
        if (isset($cat) && !empty($cat)) {
            $this->insertCat($cat, $id_noticia);
        }
        $this->conn->commit();

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
            return true;
        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function newCat($cat){
        try{
            $stmt = $this->conn->prepare("INSERT INTO category (name_category) VALUES (:cat)");
            $stmt->execute(array(":cat" => $cat));
            return $this->conn->lastInsertId();
        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function insertPdf($nomePdf, $pdftitulo){
        try{
            $stmt = $this->conn->prepare("INSERT INTO pdf (file, titulo) VALUES (:pdf, :titulo)");
            $stmt->execute(array(":pdf" => $nomePdf, ":titulo" => $pdftitulo));
            return $this->conn->lastInsertId();
        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}