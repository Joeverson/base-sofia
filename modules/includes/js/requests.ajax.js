$(function(){


    //formulario de edição de usuario
    $("#formEditUser").on("submit",function(){
        event.preventDefault();
        var url = $(".urlForm").data('url');
        var redirect = $(".urlForm").data('redirect');
        var redirectBlank = $(".urlForm").data('redirectBlank');
        var consolel = $(".urlForm").data('console');

        $.ajax({
            url: url,
            type: 'post',
            data: $(this).serialize(),
            datatype: 'html',
            beforeSend: function(){
                notification.loading("Trabalhando...");
            },
            success: function(e){
                if(redirect != undefined){
                    window.location.href = redirect;
                }else if(redirectBlank != undefined){
                    window.open(redirectBlank, '_blank');
                }else if(consolel != undefined){
                    console.log(e);
                }else{
                    window.location.reload();
                }
            },
            error: function(e){
                notification.loading("Houve algum erro, Tente de novo...");
                console.log(e);
            }
        });
    });

    //pedidos de modal generico - carregar conteudo no modal

    $(".fn").on("click", function(){
        var url = $(this).data('url');
        var title = $(this).data('title');
        var id = $(this).data('id');


        $.ajax({
            url: url,
            type: 'post',
            data: "id="+id,
            datatype: 'html',
            beforeSend: function(){
                //$('.progress-bar').show();
            },
            complete: function() {
                //$('.progress-bar').fadeOut();
            },
            success: function(e){
                $('.modal-title').html(title);
                $('.modal-body').html(e);
                $('#modalUses').modal('show');
            }
        });
    });


    /*
     ajax de serviço, usado para mandar mensagens para algum arquivo php ou ate mesmo um arquivo de configuração,
     //.. este ajax é mais para enviar uma mensagem para alguem, ele possue alguns parametros:

     ##lembrando que os 'data' são os atributos que seram colocados na tag html que vc deseja que seje que envie.

     data-url [obrigatorio] => que recebe qual arquivo ou sistema que irá receber a mensagem
     data-msg [obrigatorio] => onde esta esta a mensagem que irá ser enviada para o desino informado no data-url
     data-notification [opcional] => recebe a mensagem que deseja apresentar, ele ira notificar uma tela de sucesso para a mensagem enviada
     data-reload [opcional] => recebe true or false, ele ira recarregar a pagina apois o envio da mensagem.

     .::logica::.

     a tag ou btn, que vc deseje que envie a mensagem deve conter a class 'send-msg' e os atributos 'data'
     para a configuração correta do envio ajax.

     ele envia a mensagem assim qeu for clicado na tag ou btn que esta com a classe e os atributos.

      */

    $(".send-msg").on("click", function(){
        var url = $(this).data('url');
        var msg = $(this).data('msg');
        var id = $(this).data('id');
        var reload = $(this).data('reload');
        var notification  = $(this).data('notification');


        $.ajax({
            url: url,
            type: 'post',
            data: "msg="+msg+"&id="+id,
            datatype: 'html',
            beforeSend: function(){
                //$('.progress-bar').show();
            },
            complete: function() {
                //$('.progress-bar').fadeOut();
            },
            success: function(e){
                console.log(e);

                if(notification !== undefined)
                    notification.ok(notification);

                if(reload !== undefined)
                    window.location.reload();
            }
        });
    });

});