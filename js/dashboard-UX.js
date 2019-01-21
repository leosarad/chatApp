    $('.toggle').click(function(){
        $('.toggle div').toggleClass("toggle-silent")
    })

    $('.extend').click(function(){
        var recents=$('.recents').outerWidth();   
        if(recents < 120){
            $('.recents').css('width','225px');
        } else{
            $('.recents').css('width','100px');
        }
    });
    function extend(){
        var a=$('.recents').outerWidth();
        if(a<120){
            $('.extend i').text("arrow_right");
            $('.extend span').text("Expand");
            $('.heading span:nth-child(2)').hide('slow');
            $('.recent-list .list-item .name').hide();
        } else{
            $('.extend i').text("arrow_left")
            $('.extend span').text("Shrink")
            $('.heading span:nth-child(2)').show('slow');
            $('.recent-list .list-item .name').show();
        }
    }
    setInterval(extend,100);
    function resize(){
        if($(document).height()<480 || $(document).width()<590 ){
            $('.wrapper').hide('slow');
            $('.resize-msg').show('slow');
        } else{
            $('.wrapper').show('slow');
            $('.resize-msg').hide('slow');
        }
//        if($(document).width()>770 ){
//           $('.recents').css('width','225px');
//        } else{
//            $('.recents').css('width','100px');
//        }
    }
    setInterval(resize,100);
    //        $(window).res(function(){
    //            resize();
    //        })
    //
    //        $(document).ready(function() {
    //            scroll_btm()
    //            resize()
    //        });
    function scroll_btm(){
        $('.chat-box .msg-wrapper').animate({
            scrollTop: $('.msg-wrapper').get(0).scrollHeight
        }, 500);
    }