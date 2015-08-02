$(function(){

    // preload de imagem
    $.fn.imgShow = function(){
        $(this.selector).on("change", function(evt){
            var files = evt.target.files; // lista de arquivos
            // a tag img que possui a classe imagem-slide vai receber a imagem que foi update
            $('.imagem-show').attr("src", URL.createObjectURL(event.target.files[0]));
        });
    };

    // preload de imagem
    $.fn.countDays = function(date){
        now = new Date();
        $date = [now.getDate(), now.getMonth()+1, now.getFullYear()];

        $d = date.split('/');
        $d2 = $date;
        $days = 0;

        while(true){
            if($d[0] < 31){
                $d[0]++;
            }else{
                if($d[1] <= 12){
                    $d[1]++;
                    $d[0] = 1;
                }else{
                    if($d[2] <= $d2[2]){
                        $d[2]++;
                        $d[1] = 1;
                    }else{
                        return 0;
                    }

                }
            }

            $days++;
            if(($d[0]==$d2[0]) && ($d[1]==$d2[1]) && ($d[2]==$d2[2])){
                return $days;
            }

        }
    };

});