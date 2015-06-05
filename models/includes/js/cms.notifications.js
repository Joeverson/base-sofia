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