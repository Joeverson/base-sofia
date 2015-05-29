<?php
class FILES{
    public function __construct(){}


    public function getFile(){
        /*
				este arquivo é responsavel para fazer download dos arquivos e
				da apresentação grafica deles no browser
		*/

        $caminho = 'models/';
        $dir = opendir($caminho);
        $n = 0;
        //$leituraFiles = readdir($dir);

        if($dir === false){ // testa se abriu o diretorio
            return "ERROR: --> diretorio não encontrado";
        }

        if(readdir($dir) === false){ // testa se abriu o diretorio
            return "ERROR --> premissoes de diretorio negado, não pode abrir o diretorio";
        }

        while (($file = readdir($dir)) !== false) { // listar todos os arquivos e colocar uma imagem em cada tipo de file
            if(!(($file == '.')||($file == '..'))){
                $fileM[$n] = "<a href='$caminho$file' target='_blank'><div class='btFile clicar'><img src='img/tag.png' width='60px'><br>$file</div></a>";
                $n++;
            }
        }
        closedir($dir);

        return $fileM;
    }

    public function includeModel($file){
        include_once 'models/'.$file;
    }


    public function upload($arquivoTmp, $caminho, $typo = array('image/jpeg', 'image/pjpeg', 'image/jpg', 'image/png')){
        try{
            $tipo_img = $arquivoTmp['type'];
            if (!in_array($tipo_img, $typo)) throw new Exception("Formato de arquivo não permitido. Formato utilizado: " . $tipo_img);
            $extensao = ($arquivoTmp['type'] == 'image/png') ? ".png" : ".jpg";
            $nome_arquivo = md5(time()) . $extensao;
            if (move_uploaded_file($arquivoTmp['tmp_name'], $caminho . $nome_arquivo)){
                return $nome_arquivo;
            }else{
                throw new Exception("Arquivo não enviado");
            }
        }catch (Exception $e){
            throw new Exception($e->getMessage());
        }

    }
}