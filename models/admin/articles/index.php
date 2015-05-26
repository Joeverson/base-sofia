<?php
include "models/widgets/topo.php";
include "models/widgets/sidebar.php";
?>

<div id="wrapper">
    <div class="overlay"></div>
    <!-- Page Content -->
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <div class="modal-dialog notice">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Notícias</h4>
                            </div>
                            <div class="modal-body">
                                <p>Vamos lá, preparado para adicionar uma nova notícia?</p>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <!--label>Name</label-->
                                        <input type="text" name="title" class="form-control" placeholder="Titulo" required="">
                                    </div>
                                    <div class="col-xs-6">
                                        <!--label>Email</label-->
                                        <input type="text" name="subtitle" class="form-control" placeholder="Subtitulo" required="">
                                    </div>
                                </div>
                                <div class="row" style="padding: 10px 0 0 0;">
                                    <div class="col-xs-6">
                                        <label>Upload de Imagem</label>
                                        <input type="file" name="img" class="form-control" placeholder="Subtitulo" required="">
                                    </div>
                                </div>
                                <div class="row" style="padding: 30px 0 0 0;">
                                    <div class="col-xs-12">
                                        <select name="Cat" id="cat" class="form-control">
                                            <option value="-1">Selecione uma Categoria</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="padding: 20px 0 0 0;">
                                    <div class="col-xs-12">
                                        <label>Resumo</label>
                                        <textarea class="form-control textEdit col-md-12" rows="3" placeholder="Breve resumo..."></textarea>
                                    </div>
                                </div>
                                <div class="row" style="padding: 30px 0 50px 0;">
                                    <div class="col-xs-12">
                                        <label>Noticia</label>
                                        <textarea class="form-control textEdit col-md-12" rows="13" placeholder="Notícia"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="modal-footer save-in-footer col-md-12">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success">Salvar</button>
            </div>
        </div>

    </div>

</div>

<?php
include "models/widgets/rodape.php";
?>
