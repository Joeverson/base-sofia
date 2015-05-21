var notification = {
    "ok": function(sms){
        $('.notification').fadeIn('slow');
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
    }
};