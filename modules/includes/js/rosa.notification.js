$(function(){
    $('body').prepend('<!-- div de notificações --><div class="alert alert-success alert-dismissable notification"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong></strong></div><!-- /div de notificações -->');
});
var notification = {
    "ok": function(sms){
        $('.notification').css({backgroundColor: '#b9df90', color: 'white'}).fadeIn('slow');
        $('.notification strong').html(sms);

        setTimeout(function(){
            $('.notification').fadeOut();
        }, 5000);
    },
    "error": function(sms){
        $('.notification').css({backgroundColor: '#F44336', color: 'white'}).fadeIn('slow');
        $('.notification strong').html(sms);

        setTimeout(function(){
            $('.notification').fadeOut();
        }, 5000);
    },
    "loading": function(sms){
        $('.notification').css({backgroundColor: '#FFEB3B', color: '#1c1c1c'}).fadeIn('slow');
        $('.notification strong').html(sms);

        setTimeout(function(){
            $('.notification').fadeOut();
        }, 5000);
    }
};