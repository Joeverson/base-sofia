$(function(){

    // preload de imagem
    $.fn.imgShow = function(){
        $(this.selector).on("change", function(evt){
            var files = evt.target.files; // lista de arquivos
            // a tag img que possui a classe imagem-slide vai receber a imagem que foi update
            $('.imagem-slider').attr("src", URL.createObjectURL(event.target.files[0]));
        });
    };

});