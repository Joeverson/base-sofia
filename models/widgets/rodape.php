</div>

</div>
<!-- /#wrapper -->
<!-- div de notificações -->
<div class="alert alert-success alert-dismissable notification">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong></strong>.
</div>
<!-- /div de notificações -->
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
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'.textEdit'});</script>
</body>
</html>