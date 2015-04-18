<?
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
        $path = 'models/';
        return include_once $path.$file;
    }


    public function upload($arquivoCliente){  // recebe o  $_FILES['file'];
        /*
            este arquivo e para guardar qualquer arquivo no servidor
            booleanos (por problemas tive que usar esta nomeclatura de booleanos)
                2 = false
                1 = true
        */
        //session_start();

        if($arquivoCliente['error'] == 0){ // se não ocorrer nenhum erro ae ele grava no servidor
            if(move_uploaded_file($arquivoCliente['tmp_name'], '../arquivos/'.$arquivoCliente['name'])){
                $_SESSION['confirm'] = 'noError'; // me retorna quando for tudo ok
                header('location: ../index.php');
            }else{ // error no upload entrada no servidor
                $_SESSION['confirm'] = 'errorUpload';
                header('location: ../index.php');
            }
        }else{ // error no upload(saida do pc client)
            $_SESSION['confirm'] = 'errorFile';
            header('location: ../index.php');
        }
        //var_dump($arquivoCliente['tmp_name']);

    }
}