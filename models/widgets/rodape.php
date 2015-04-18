<!-- /#wrapper -->
<script type="text/javascript">
    $(document).ready(function () {


        var trigger = $('.hamburger'),
            overlay = $('.overlay'),
            isClosed = false;


        trigger.click(function () {
            hamburger_cross();
        });

        // responsavel por carregar na pagina as pages...
        $('a').click(function(){
            ajaxUrl($(this).data('link'));
            hamburger_cross();
        });



        function hamburger_cross() {

            if (isClosed == true) {
                overlay.hide();
                trigger.removeClass('is-open');
                trigger.addClass('is-closed');
                isClosed = false;
            } else {
                overlay.show();
                trigger.removeClass('is-closed');
                trigger.addClass('is-open');
                isClosed = true;
            }
        }

        $('[data-toggle="offcanvas"]').click(function () {
            $('#wrapper').toggleClass('toggled');
        });
    });

    function ajaxUrl(url){ // usado para trazer as paginas
        $.ajax({
            url:url,
            type:'post',
            data:'',
            datatype:'html',
            success:function(e){
                $('.pages').html(e);
            }
        }).fail(function(e){
            $('.pages').html(e.responseText);
        })
    }
</script>
</body>
</html>